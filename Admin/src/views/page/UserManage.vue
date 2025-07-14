<template>
  <div class="users-page bg-gray-100 h-full p-6 rounded-lg overflow-y-auto" :style="{ maxHeight: `calc(100vh - ${headerHeight}px)` }">
    <!-- Header and Search Bar -->
    <div class="flex justify-between items-center mb-6">
      <div>
        <h2 class="text-2xl font-semibold text-gray-800">Users Management</h2>
        <p class="text-gray-500 text-sm">All the user include login in the system</p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="relative">
          <input type="text" placeholder="Search here..." class="border border-gray-300 rounded-lg py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
        </div>
        <select class="border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option>Newest</option>
          <option>Oldest</option>
        </select>
        <button
          class="bg-blue-600 text-white rounded-lg py-2 px-4 hover:bg-blue-700 transition duration-300"> New Users
        </button>
      </div>
    </div>

    <!-- User Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <div
        v-for="user in users"
        :key="user.id"
        class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center text-center"
      >
        <img
          :src="user.image"
          alt="User"
          class="w-24 h-24 rounded-full object-cover mb-4"
        />
        <h3 class="text-lg font-semibold text-gray-800">{{ user.name }}</h3>
        <p class="text-gray-500 text-sm">{{ user.subject }}</p>
        <div class="flex space-x-2 mt-2">
          <a href="#" class="text-blue-500 hover:underline">View profile</a>
          <span class="text-green-500">
            <svg
              class="w-4 h-4"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 13l4 4L19 7"
              ></path>
            </svg>
          </span>
        </div>
        <div v-if="user.contact" class="flex space-x-2 mt-2 text-gray-500">
          <a href="#" class="hover:text-blue-500">
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
              ></path>
            </svg>
          </a>
          <a href="#" class="hover:text-blue-500">
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16h6"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6 space-x-2">
      <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">&lt;</button>
      <button class="px-3 py-1 border rounded-lg bg-blue-500 text-white">1</button>
      <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">2</button>
      <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">3</button>
      <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">...</button>
      <button class="px-3 py-1 border rounded-lg hover:bg-gray-100">&gt;</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const headerHeight = ref(64); // Adjust this value based on your header height
const users = [
  { id: 1, name: "Abdul Kean", subject: "Mathematics", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 2, name: "Angela Moss", subject: "Science", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 3, name: "Afif Skunder", subject: "English", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 4, name: "Anita Queen", subject: "Mathematics", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 5, name: "Abigail Smurt", subject: "Science", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 6, name: "Bella Syuq", subject: "Programming", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 7, name: "Benny Gacu", subject: "Graphic Design", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 8, name: "Bella Poco", subject: "Science", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 9, name: "Chloe Simatu...", subject: "Chemistry", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 10, name: "Denny Juan", subject: "Business Management", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 11, name: "Franklin CS", subject: "Programming", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 12, name: "Freddy John", subject: "Mathematics", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 13, name: "Fanny Saragih", subject: "Computer Math", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 14, name: "Hermanto", subject: "Computer Math", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 15, name: "Lulu Salam", subject: "Science", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
  { id: 16, name: "Linda Sukawati", subject: "Science", image: "https://i.pinimg.com/1200x/4b/b7/09/4bb709a05209ed035be972fd6eef2cbf.jpg", contact: false },
];
</script>

<style scoped>
/* Ensure the container takes full height of the parent */
.users-page {
  height: 100%;
}

/* Optional: Smooth scrolling */
.users-page::-webkit-scrollbar {
  width: 6px;
}

.users-page::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.users-page::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 3px;
}

.users-page::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>