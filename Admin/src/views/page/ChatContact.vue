<template>
  <div class="chat-page bg-gray-50 h-full p-6 rounded-lg overflow-hidden flex flex-col" :style="{ maxHeight: `calc(100vh - ${headerHeight}px)` }">
    <div class="bg-white p-4 shadow-sm flex items-center justify-between rounded-lg mb-4">
      <div class="flex items-center space-x-3">
        <input type="text" placeholder="Search chats..." class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 ease-in-out text-gray-700 placeholder-gray-400">
      </div>
      <div class="flex items-center space-x-3">
        <img src="https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg" alt="Evanika Gardner" class="w-10 h-10 rounded-full border-2 border-blue-400 shadow-md">
        <div class="flex flex-col">
          <span class="font-semibold text-gray-800">ERB CODER</span>
          <span class="text-sm text-gray-500">Assistant Manager</span>
        </div>
        <span class="bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold -ml-1 mt-auto">3</span>
      </div>
    </div>

    <div class="flex flex-1 overflow-hidden rounded-lg shadow-md">
      <div class="w-1/3 bg-white border-r border-gray-100 overflow-y-auto custom-scrollbar-light">
        <div class="p-4">
          <div v-for="user in users" :key="user.name" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-50 transition duration-200 ease-in-out cursor-pointer mb-3 last:mb-0">
            <img :src="user.avatar" :alt="user.name" class="w-12 h-12 rounded-full object-cover border-2 border-gray-200">
            <div class="flex-1">
              <p class="font-semibold text-gray-800">{{ user.name }}</p>
              <p class="text-gray-500 text-sm truncate">{{ user.lastMessage }}</p>
            </div>
            <span class="text-xs text-gray-400">{{ user.time }}</span>
          </div>
        </div>
      </div>

      <div class="w-2/3 bg-blue-50 p-6 flex flex-col justify-between">
        <div class="flex-1 space-y-4 overflow-y-auto pr-2 custom-scrollbar-blue p-4 rounded" :style="{backgroundImage: 'url(https://i.pinimg.com/1200x/91/c7/6b/91c76bef6bd47ff59c648a0737cf7a78.jpg)', backgroundSize: 'cover', backgroundRepeat: 'no-repeat', backgroundPosition: 'center',}">
          <div v-for="message in messages" :key="message.time" class="flex items-end" :class="{ 'justify-end': message.user }">
            <img v-if="!message.user" src="https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg" alt="Evanika Gardner" class="w-9 h-9 rounded-full object-cover mr-3 shadow-sm">
            <div :class="{ 'bg-blue-600 text-white rounded-bl-none': message.user, 'bg-white text-gray-800 rounded-br-none': !message.user }" class="p-3 rounded-xl max-w-lg shadow-md break-words">
              <p class="font-bold ">{{message.name}}</p>
              <p class="text-sm w-70">{{ message.text }}</p>
              <span class="text-xs mt-1 block" :class="{ 'text-blue-200': message.user, 'text-gray-500': !message.user }">{{ message.time }}</span>
            </div>
            <img v-if="message.user" src="https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg" alt="Evanika Gardner" class="w-9 h-9 rounded-full object-cover ml-3 shadow-sm">
          </div>
        </div>

        <div class="mt-6 flex items-center space-x-3">
          <input type="text" placeholder="Write a message..." class="flex-1 p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out text-gray-700 placeholder-gray-400">
          <button class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition duration-200 ease-in-out shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const headerHeight = ref(64); // Adjust this value based on your header height
const users = ref([
  { name: 'Darin', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'Thanks again you have been...', time: '1 min ago' },
  { name: 'Piset', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'Okay Thanks :)', time: '2 min ago' },
  { name: 'Panha', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'Where is the nearest place...', time: '25 min ago' },
  { name: 'Thavery', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'Ok that sounds perfect 👍', time: '35 min ago' },
  { name: 'Kosal', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'Protect the senator at all...', time: '12 hours ago' },
  { name: 'Nana', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'So tell the voice inside your...', time: '1 day ago' },
  { name: 'Rubit', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'So tell the voice inside your...', time: '2 days ago' },
  { name: 'Thean', avatar: 'https://i.pinimg.com/736x/34/c6/02/34c60274f0974620292fc45eeec09bf5.jpg', lastMessage: 'So tell the voice inside your...', time: '2 days ago' },
]);

const messages = ref([
  { user: false, name:'Darin', text: 'Hello Piseth, ផឹកអត់?', time: '10:20 am' },
  { user: true, name:'Peseth', text: 'Hello Ah mak! ផឹកតើ​!​កន្លែង​ណា​ តាលាក់location mk', time: '12:33 am' },
  { user: false, name:'Darin', text: 'កន្លែងចាស់ នឺង​ហើយ​ ​យី​ធើឯងអត់ដឹងអីណា ទៅរាល់ដងសោះ​😂', time: '11:45 am' },
  { user: true, name:'peseth', text: 'ហៅមេ ញ៉ាផង​😁', time: '12:00 pm' },
  { user: false, name:'Darin', text: 'Kk Kom pey', time: '12:02 pm' },
]);
</script>

<style scoped>
.chat-page {
  height: 100%;
}

/* Custom Scrollbar for Light Background (User List) */
.custom-scrollbar-light::-webkit-scrollbar {
  width: 8px;
}

.custom-scrollbar-light::-webkit-scrollbar-track {
  background: #f0f4f8; /* Light gray-blue */
}

.custom-scrollbar-light::-webkit-scrollbar-thumb {
  background: #cbd5e0; /* Gray-blue */
  border-radius: 4px;
}

.custom-scrollbar-light::-webkit-scrollbar-thumb:hover {
  background: #a0aec0; /* Darker gray-blue */
}

/* Custom Scrollbar for Blue Background (Chat Window) */
.custom-scrollbar-blue::-webkit-scrollbar {
  width: 8px;
}

.custom-scrollbar-blue::-webkit-scrollbar-track {
  background: #e0f2fe; /* Lighter blue */
}

.custom-scrollbar-blue::-webkit-scrollbar-thumb {
  background: #90cdf4; /* Medium blue */
  border-radius: 4px;
}

.custom-scrollbar-blue::-webkit-scrollbar-thumb:hover {
  background: #63b3ed; /* Darker blue */
}
</style>