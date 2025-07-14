<template>
  <div class="min-h-screen bg-gray-100 flex font-poppins">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg h-screen p-6 flex flex-col">
      <div class="mb-8">
        <span class="text-2xl font-bold text-indigo-600">📱 Phone Store</span>
      </div>
      <nav class="flex-grow">
        <ul class="space-y-2">
          <li><router-link to="/" v-slot="{ isActive }" :class="['flex items-center p-2 rounded-lg transition', isActive ? 'text-indigo-600 bg-gray-100' : 'text-gray-600 hover:text-indigo-600 hover:bg-gray-100']" ><span class="mr-2">🏠</span> Home</router-link></li>
          <li><router-link to="/ecommerce" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">📱</span> eCommerce</router-link></li>
          <li><router-link to="/users" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">👤</span> Mange Users</router-link></li>
          <li><router-link to="/chats" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">💬</span> Chats</router-link></li>
          <li><router-link class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">📅</span> Calendar</router-link></li>
          <li><router-link class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">🎫</span> Tickets</router-link></li>
          <!-- Add more links here -->
           <li class="mt-4">
            <div class="text-sm text-gray-400">Page view</div>
            <div class="flex space-x-2 mt-2">
              <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300"><span class="text-xl">🌳</span></button>
              <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300"><span class="text-xl">💰</span></button>
            </div>
          </li>
        </ul>
      </nav>
      <div class="mt-auto">
        <!-- Admin Info -->
        <div class="flex items-center space-x-3 p-4 bg-gradient-to-r from-indigo-100 to-white rounded-xl shadow-md">
          <img src="../assets/image/admin.png" alt="User" class="w-12 h-12 rounded-full border-2 border-indigo-600">
          <div>
            <div class="text-sm font-semibold text-gray-800">ERB CODER</div>
            <div class="text-xs text-indigo-600">Admin</div>
          </div>
        </div>
        <div class="mt-4 space-y-2">
          <button class="w-full bg-gray-100 text-gray-600 p-2 rounded-lg hover:bg-gray-200 flex items-center justify-center transition">
            <span class="mr-2 text-xl">⚙️</span> Settings
          </button>
          <button class="w-full bg-gray-100 text-gray-600 p-2 rounded-lg hover:bg-gray-200 flex items-center justify-center transition">
            <span class="mr-2 text-xl">🚪</span> Log out
          </button>
        </div>
      </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-6 overflow-y-auto bg-gray-50">
      <router-view /> <!-- Render HomeBoard.vue here -->
    </main>
  </div>
</template>

<script setup>
  const linkClasses = (isActive) =>
    isActive
      ? 'flex items-center p-2 rounded-lg text-indigo-600 bg-gray-100 transition'
      : 'flex items-center p-2 rounded-lg text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition'

</script>

<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  .font-poppins {
    font-family: 'Poppins', sans-serif;
  }
</style>
