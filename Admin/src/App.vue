<template>
  <div class="min-h-screen bg-gray-100 flex font-poppins">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg h-screen p-6 flex flex-col">
      <div class="mb-8">
        <span class="text-2xl font-bold text-indigo-600">📱 Phone Store</span>
      </div>
      <nav class="flex-grow">
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">🏠</span> Home</a></li>
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">📱</span> eCommerce</a></li>
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">👤</span> Contacts</a></li>
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">💬</span> Chats</a></li>
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">📅</span> Calendar</a></li>
          <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex items-center p-2 rounded-lg hover:bg-gray-100"><span class="mr-2">🎫</span> Tickets</a></li>
          <li class="mt-4">
            <div class="text-sm text-gray-400">Page view</div>
            <div class="flex space-x-2 mt-2">
              <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300"><span class="text-xl">🌳</span></button>
              <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300"><span class="text-xl">💰</span></button>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Admin Profile -->
      <div class="mt-auto">
        <div class="flex items-center space-x-3 p-4 bg-gradient-to-r from-indigo-100 to-white rounded-xl shadow-md">
          <img src="https://via.placeholder.com/40" alt="User" class="w-12 h-12 rounded-full border-2 border-indigo-600">
          <div>
            <div class="text-sm font-semibold text-gray-800">Jane Cooper</div>
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

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto" style="max-height: calc(100vh - 64px);">
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold">Dashboard</h2>
          <div class="flex space-x-2">
            <input type="text" placeholder="Search..." class="p-2 rounded-lg border border-gray-300">
            <button class="bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-700"><span class="text-xl">🔍</span></button>
          </div>
        </div>

        <!-- Sales Distribution -->
        <section class="mb-8">
          <h3 class="text-lg font-semibold mb-4">Sales Distribution</h3>
          <p class="text-gray-600 mb-4">This is all Platform Sales Generated</p>
          <div class="grid grid-cols-4 gap-4">
            <div class="bg-indigo-100 p-4 rounded-lg text-center">
              <p class="text-gray-600">Total Phone Sales</p>
              <p class="text-2xl font-bold text-indigo-700">$45,678.00</p>
            </div>
            <div class="bg-indigo-100 p-4 rounded-lg text-center">
              <p class="text-gray-600">By Website</p>
              <p class="text-2xl font-bold text-indigo-700">$6.5k (45%)</p>
            </div>
            <div class="bg-indigo-100 p-4 rounded-lg text-center">
              <p class="text-gray-600">By Mobile App</p>
              <p class="text-2xl font-bold text-indigo-700">$3.2k (25%)</p>
            </div>
            <div class="bg-indigo-100 p-4 rounded-lg text-center">
              <p class="text-gray-600">By Store</p>
              <p class="text-2xl font-bold text-indigo-600">$1.8k (15%)</p>
            </div>
          </div>
        </section>

        <!-- Charts and Metrics -->
        <div class="grid grid-cols-3 gap-6">
          <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Sales Overview</h3>
            <div class="flex items-center justify-center h-32">
              <div class="w-24 h-24 bg-indigo-100 rounded-full flex items-center justify-center">
                <span class="text-2xl font-bold text-indigo-700">$600.00</span>
              </div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Revenue Updates</h3>
            <div class="space-y-2">
              <div class="flex justify-between"><span>Profit</span><span>$234.50</span></div>
              <div class="flex justify-between"><span>Expense</span><span>$145.00</span></div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Yearly Phone Sales</h3>
            <div class="h-32 flex items-end justify-around">
              <div class="w-8 bg-indigo-300 rounded-t" style="height: 60%"></div>
              <div class="w-8 bg-indigo-300 rounded-t" style="height: 80%"></div>
              <div class="w-8 bg-indigo-300 rounded-t" style="height: 40%"></div>
            </div>
            <div class="text-sm text-gray-600 mt-2">2023: $3476, 2024: $4476</div>
          </div>
        </div>

        <!-- Active Users and Payment Gateways -->
        <div class="grid grid-cols-2 gap-6 mt-6">
          <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Active Users</h3>
            <p class="text-gray-600 mb-2">8.0% vs previous month</p>
            <div class="flex items-center justify-center h-32">
              <span class="text-3xl font-bold text-indigo-700">23,214</span>
              <span class="ml-2 text-gray-600">Total Active User</span>
            </div>
            <div class="mt-4 w-full h-32">
              <img src="https://via.placeholder.com/200x100" alt="World Map" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Payment Gateways</h3>
            <div class="space-y-4">
              <div class="flex justify-between items-center">
                <div class="flex items-center">
                  <span class="w-8 h-8 bg-red-200 rounded-full flex items-center justify-center mr-2">💳</span>
                  <span>Phone Brands</span>
                </div>
                <span>+5433</span>
              </div>
              <div class="flex justify-between items-center">
                <div class="flex items-center">
                  <span class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center mr-2">💰</span>
                  <span>Wallet</span>
                </div>
                <span>+3235</span>
              </div>
              <div class="flex justify-between items-center">
                <div class="flex items-center">
                  <span class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center mr-2">💳</span>
                  <span>Credit card</span>
                </div>
                <span>+2235</span>
              </div>
              <button class="w-full mt-4 bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-700">View transactions</button>
            </div>
          </div>
        </div>

        <!-- Additional Content for Scrolling -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg shadow">
          <h3 class="text-lg font-semibold mb-2">Recent Phone Orders</h3>
          <p class="text-gray-600">Order #001 - iPhone 15 - $999.00</p>
          <p class="text-gray-600">Order #002 - Samsung Galaxy S24 - $899.00</p>
          <p class="text-gray-600">Order #003 - Google Pixel 9 - $799.00</p>
          <p class="text-gray-600">Order #004 - OnePlus 12 - $699.00</p>
          <p class="text-gray-600">Order #005 - Xiaomi 14 - $599.00</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

.font-poppins {
  font-family: 'Poppins', sans-serif;
}
</style>