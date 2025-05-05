import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsHost: import.meta.env.VITE_PUSHER_HOST,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: false,//(import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    debug: true,
});

window.Echo.connector.pusher.connection.bind('connected', function() {
    console.log('WebSocket connection established.');
});

window.Echo.connector.pusher.connection.bind('disconnected', function() {
    console.log('WebSocket connection lost.');
});

window.Echo.channel('chat')
    .listen('MessageCreateEvent', (event) => {
        console.log('New message recieved from WS ');

        const messageId = event.id;
        const content = event.content;
        const userId = event.user_id;
        const userName = event.user.username;
        const userIcon = event.user_icon;
        const createdAt = event.created_at;

        // TODO: To prevent double chat, fix better
        if (currentUserId === userId) {
            return
        }

        const messagesContainer = document.querySelector('.messages');

        const messageDiv = document.createElement('div');
        messageDiv.classList.add('group', 'flex', 'items-start', 'space-x-3', 'relative', 'cursor-pointer', 'transition-colors', 'duration-200', 'hover:outline-none', 'hover:ring-2', 'hover:ring-indigo-600', 'focus:outline-none', 'focus:ring-2', 'focus:ring-indigo-600', 'p-1', 'rounded');

        const messageHTML = `
            <!-- User PFP -->
            <img src="${userIcon || 'https://placehold.co/30x30'}" alt="User PFP"
                class="w-10 h-10 rounded-full object-cover" />
            <!-- Message content -->
            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <!-- User name -->
                    <span class="font-bold text-blue-400 hover:underline">${userName}</span>
                    <span class="text-xs text-gray-500">${new Date(createdAt).toLocaleString()}</span>
                </div>
                <!-- Message content -->
                <p class="text-white">${content}</p>
            </div>

            <!-- Hover icons -->
            <div class="absolute right-0 top-0 hidden group-hover:flex space-x-2 p-1 bg-gray-800 rounded">
                <button title="React">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.99 16.5 3.75 3.75m0 0 3.75-3.75m-3.75 3.75V3.75H4.49" />
                    </svg>
                </button>
                <button title="Reply" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                    </svg>
                </button>
                <button title="edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                </button>
                <button title="trash">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </div>
        `;

        messageDiv.innerHTML = messageHTML;
        messagesContainer.appendChild(messageDiv);

        messagesContainer.scrollTop = messagesContainer.scrollHeight;
});

document.getElementById('inviteCopyBtn').addEventListener('click', async () => {
    await navigator.clipboard.writeText(document.getElementById('inviteUrl').value);
    alert('Copied invite link to clipboard!');
})
