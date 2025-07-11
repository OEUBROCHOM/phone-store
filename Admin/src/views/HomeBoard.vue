<template>
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
        <section class="mb-8 relative overflow-hidden rounded-xl">
          <div class="absolute inset-0 bg-gradient-to-b from-indigo-100 to-blue-50 opacity-80 z-0">
            <div class="absolute top-1/2 left-0 w-full overflow-hidden" style="transform: translateY(-50%); height: 100%;">
              <div class="animate-marquee flex space-x-8 py-4 items-center h-full mt-5" style="animation-duration: 20s; animation-iteration-count: infinite;">
                <img v-for="(item, index) in imagephoneDistribut" :key="index" :src="item.imageUlrd" :alt="item.imageUlrd.split('=')[1]" class="h-40 rounded-[5%]">
              </div>
            </div>
          </div>

          <div class="relative z-10 p-6 h-60">
            <h3 class="text-lg font-semibold mb-10 text-gray-800 ">Sales Distribution</h3>
            <div class="grid grid-cols-4 gap-4">
              <div class="bg-white bg-opacity-90 p-4 rounded-lg text-center shadow-md">
                <p class="text-gray-600">Total Phone Sales</p>
                <p class="text-2xl font-bold text-indigo-700">$45,678.00</p>
              </div>
              <div class="bg-white bg-opacity-90 p-4 rounded-lg text-center shadow-md">
                <p class="text-gray-600">By Website</p>
                <p class="text-2xl font-bold text-indigo-700">$6.5k (45%)</p>
              </div>
              <div class="bg-white bg-opacity-90 p-4 rounded-lg text-center shadow-md">
                <p class="text-gray-600">By Mobile App</p>
                <p class="text-2xl font-bold text-indigo-700">$3.2k (25%)</p>
              </div>
              <div class="bg-white bg-opacity-90 p-4 rounded-lg text-center shadow-md">
                <p class="text-gray-600">By Store</p>
                <p class="text-2xl font-bold text-indigo-600">$1.8k (15%)</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Track overview -->
        <div class="grid grid-cols-3 gap-6">
          <div class="bg-white p-4 rounded-lg shadow border border-indigo-100">
            <h3 class="text-lg font-semibold mb-4 text-left">Sales Overview</h3>
            <div class="flex justify-center items-center">
              <div class="w-[250px] h-[250px]">
                <canvas ref="pieChartRef" class="w-full h-full"></canvas>
              </div>
            </div>
          </div>

          <div class="bg-white p-4 rounded-lg shadow border border-indigo-100">
          <h3 class="text-lg font-semibold mb-2 text-left">Revenue Updates</h3>
          <div class="relative w-full h-64">
            <canvas ref="revenueChartRef" class="w-full h-full"></canvas>
          </div>
        </div>

          <div class="bg-white p-4 rounded-lg shadow border border-indigo-100">
            <h3 class="text-lg font-semibold mb-4 text-lef">Yearly Phone Sales</h3>
            <div class="relative w-full h-64">
              <canvas ref="yearlyBarChartRef" class="w-full h-full"></canvas>
            </div>
            <div class="text-sm text-gray-600 mt-2 text-center">
              🟦2023= 3476$  🟩2024= 4476$
            </div>
          </div>
        </div>

        <!-- ===Map & Payment== -->
        <div class="grid grid-cols-2 gap-6 mt-6">
          <div class="bg-cyan-10 p-4 rounded-lg shadow relative overflow-hidden border border-indigo-100">
            <h3 class="text-lg font-semibold mb-2">Active Users</h3>
            <p class="text-gray-600 mb-2">8.0% Vs previous month</p>
            <!-- Map in background -->
            <div class="absolute inset-0 opacity-20 z-0 mt-5">
              <div class="w-full h-full" ref="mapChartDiv"></div>
            </div>
            <!-- Active user count in foreground -->
            <div class="relative z-10 flex items-center justify-center h-32">
              <span class="text-3xl font-bold text-indigo-700">23,214</span>
              <span class="ml-2 text-gray-600">Total Active User</span>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow border border-indigo-100">
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

        <!-- Table order -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg shadow border border-indigo-200">
          <h3 class="text-lg font-semibold mb-4">Recent Phone Orders</h3>
          <div class="overflow-x-auto">
            <div class="max-h-80 overflow-y-auto relative border border-gray-200 rounded-lg hide-scrollbar"> <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 sticky top-0 z-10"> <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order NO.</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="order in orders" :key="order.id">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ order.orderNo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ order.product }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ order.price.toFixed(2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ order.customer }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ order.orderDate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm" :class="statusColor(order.status)">{{ order.status }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="relative inline-block text-left">
                        <div>
                          <button
                            type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="toggleDropdown(order.id)"
                            :id="`menu-button-${order.id}`"
                            aria-expanded="true"
                            aria-haspopup="true"
                          >
                            <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                          </button>
                        </div>

                        <div
                          v-if="openDropdownId === order.id"
                          class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg border border-green-200 bg-white ring-opacity-5 focus:outline-none mr-10"
                          role="menu"
                          aria-orientation="vertical"
                          :aria-labelledby="`menu-button-${order.id}`"
                          tabindex="-1"
                        >
                          <div class="py-1" role="none">
                            <a href="#" @click.prevent="performAction(order.id, 'View')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-blue-500">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View
                              </span>
                            </a>
                            <a href="#" @click.prevent="performAction(order.id, 'Delete')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-red-500">
                                <svg class="mr-2 h-4 w-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                              </span>
                            </a>
                            <hr class="my-1 border-gray-100" role="none">
                            <a href="#" @click.prevent="updateStatus(order.id, 'Completed')" class="text-green-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Completed</a>
                            <a href="#" @click.prevent="updateStatus(order.id, 'Pending')" class="text-yellow-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Pending</a>
                            <a href="#" @click.prevent="updateStatus(order.id, 'Cancelled')" class="text-red-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Cancelled</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">006</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">iPhone SE</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$429.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Frank Green</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">July 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">Completed</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="relative inline-block text-left">
                        <div>
                          <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="toggleDropdown(6)" id="menu-button-6" aria-expanded="true" aria-haspopup="true">
                            <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                          </button>
                        </div>
                        <div v-if="openDropdownId === 6" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg border border-green-200 bg-white ring-opacity-5 focus:outline-none mr-10" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-6" tabindex="-1">
                          <div class="py-1" role="none">
                            <a href="#" @click.prevent="performAction(6, 'View')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-blue-500">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View
                              </span>
                            </a>
                            <a href="#" @click.prevent="performAction(6, 'Delete')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-red-500">
                                <svg class="mr-2 h-4 w-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                              </span>
                            </a>
                            <hr class="my-1 border-gray-100" role="none">
                            <a href="#" @click.prevent="updateStatus(6, 'Completed')" class="text-green-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Completed</a>
                            <a href="#" @click.prevent="updateStatus(6, 'Pending')" class="text-yellow-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Pending</a>
                            <a href="#" @click.prevent="updateStatus(6, 'Cancelled')" class="text-red-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Cancelled</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">007</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Samsung A55</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Grace Hopper</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">July 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-600">Pending</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="relative inline-block text-left">
                        <div>
                          <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="toggleDropdown(7)" id="menu-button-7" aria-expanded="true" aria-haspopup="true">
                            <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                          </button>
                        </div>
                        <div v-if="openDropdownId === 7" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg border border-green-200 bg-white ring-opacity-5 focus:outline-none mr-10" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-7" tabindex="-1">
                          <div class="py-1" role="none">
                            <a href="#" @click.prevent="performAction(7, 'View')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-blue-500">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View
                              </span>
                            </a>
                            <a href="#" @click.prevent="performAction(7, 'Delete')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-red-500">
                                <svg class="mr-2 h-4 w-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                              </span>
                            </a>
                            <hr class="my-1 border-gray-100" role="none">
                            <a href="#" @click.prevent="updateStatus(7, 'Completed')" class="text-green-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Completed</a>
                            <a href="#" @click.prevent="updateStatus(7, 'Pending')" class="text-yellow-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Pending</a>
                            <a href="#" @click.prevent="updateStatus(7, 'Cancelled')" class="text-red-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Cancelled</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">008</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Google Pixel 8a</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$499.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Alan Turing</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">July 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">Completed</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <div class="relative inline-block text-left">
                        <div>
                          <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="toggleDropdown(8)" id="menu-button-8" aria-expanded="true" aria-haspopup="true">
                            <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                          </button>
                        </div>
                        <div v-if="openDropdownId === 8" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg border border-green-200 bg-white ring-opacity-5 focus:outline-none mr-10" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-8" tabindex="-1">
                          <div class="py-1" role="none">
                            <a href="#" @click.prevent="performAction(8, 'View')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-blue-500">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                View
                              </span>
                            </a>
                            <a href="#" @click.prevent="performAction(8, 'Delete')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">
                              <span class="inline-flex items-center text-red-500">
                                <svg class="mr-2 h-4 w-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                              </span>
                            </a>
                            <hr class="my-1 border-gray-100" role="none">
                            <a href="#" @click.prevent="updateStatus(8, 'Completed')" class="text-green-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Completed</a>
                            <a href="#" @click.prevent="updateStatus(8, 'Pending')" class="text-yellow-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Pending</a>
                            <a href="#" @click.prevent="updateStatus(8, 'Cancelled')" class="text-red-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">Cancelled</a>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </main>
</template>

<script setup>
  import { onMounted, ref, computed, onUnmounted } from 'vue';
  import { Chart, registerables } from 'chart.js';
  // map
  import * as am5 from "@amcharts/amcharts5";
  import * as am5map from "@amcharts/amcharts5/map";
  import am5geodata_cambodiaLow from "@amcharts/amcharts5-geodata/cambodiaLow";
  import "@amcharts/amcharts5/themes/Animated";
  import api from '@/api';

  Chart.register(...registerables);

  // Pie chart
  const pieChartRef = ref(null);
  onMounted(() => {
    const ctx = pieChartRef.value.getContext('2d');
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Online Sales', 'App Sales', 'Store Sales'],
        datasets: [{
          data: [320, 180, 100],
          backgroundColor: [
            '#6366f1', // Indigo
            '#60a5fa', // Blue
            '#c084fc'  // Purple
          ],
          hoverOffset: 10
        }]
      },
      options: {
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              font: {
                family: 'Poppins',
                size: 12
              }
            }
          }
        }
      }
    });
  });

    // Distribution image animation
    const imagephoneDistribut = ref([
    { imageUlrd: "https://s7d1.scene7.com/is/image/dish/iPhone-16-Ultramarine-1?$ProductBase$&fmt=webp-alpha" }, // iPhone
    { imageUlrd: "https://t-mobile.scene7.com/is/image/Tmusprod/Samsung-Galaxy-S25-Ultra-Titanium-Silverblue-backimage" }, // Samsung
    { imageUlrd: "https://i5.walmartimages.com/asr/43afa489-3c0d-4c4f-8781-91d1d90cdb1c.b8be2ea47304c13d21db7fb944f4977a.jpeg" }, // Asus
    { imageUlrd: "https://i.pinimg.com/736x/1c/84/a1/1c84a1b1b2b8c67349ce129414995e7a.jpg" }, // Honor
    { imageUlrd: "https://i.pinimg.com/736x/ac/df/ea/acdfea37c8fe4adf23e354e04e461876.jpg" }, // Huawei
    { imageUlrd: "https://fdn2.gsmarena.com/vv/pics/infinix/infinix-zero-30-4g-1.jpg" }, // Infinix
    { imageUlrd: "https://i.pinimg.com/736x/a5/09/40/a50940b9a175d43d087a00a87451bf6d.jpg" }, // Nokia
    { imageUlrd: "https://i.pinimg.com/1200x/5a/b8/b5/5ab8b5bb2f3c50f3250d6d9795bd6013.jpg" }, // Nothing
    { imageUlrd: "https://i.pinimg.com/736x/09/26/d2/0926d2846a283d22da8066fc737567d3.jpg" }, // OnePlus
    { imageUlrd: "https://i.pinimg.com/1200x/76/60/dc/7660dc8a12519f747feaa3664c304322.jpg" }, // Nubia
    { imageUlrd: "https://i.pinimg.com/1200x/df/fa/2a/dffa2a3660a79a00912179f305339587.jpg" }, // Oppo
    { imageUlrd: "https://i.pinimg.com/1200x/fc/e3/4f/fce34ff6f4c5ba4cc4aa31e07570d196.jpg" }, // Realme
    { imageUlrd: "https://i.pinimg.com/736x/9e/d6/30/9ed630ba81f0c44072a5125dffbe4133.jpg" }, // RedMagic
    { imageUlrd: "https://i.pinimg.com/1200x/7a/8e/44/7a8e445454fb3cbbf8b0a875f1a98b2c.jpg" }, // Tecno
    { imageUlrd: "https://fdn2.gsmarena.com/vv/pics/vivo/vivo-x100-pro-1.jpg" }, // Vivo
    { imageUlrd: "https://fdn2.gsmarena.com/vv/pics/xiaomi/xiaomi-14-1.jpg" }, // Xiaomi
    { imageUlrd: "https://fdn2.gsmarena.com/vv/pics/sony/sony-xperia-1-vi-1.jpg" }, // Sony
    { imageUlrd: "https://i.pinimg.com/1200x/b8/34/10/b834107d198216a64aba148ddf3c1b61.jpg" }, // Xundd
  ]);

  // Revenue chart
  const revenueChartRef = ref(null);
  onMounted(() => {
    const ctx = revenueChartRef.value.getContext('2d');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Revenue'],
        datasets: [
          {
            label: 'Profit',
            data: [234.50],
            borderColor: 'green',
            backgroundColor: 'green',
            tension: 0.4,
            fill: false,
            pointRadius: 5,
          },
          {
            label: 'Expense',
            data: [145.00],
            borderColor: 'red',
            backgroundColor: 'red',
            tension: 0.4,
            fill: false,
            pointRadius: 5,
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          tooltip: {
            mode: 'index',
            intersect: false,
          },
          legend: {
            position: 'top'
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });

  // Chart year of salse
  const yearlyBarChartRef = ref(null);
  onMounted(() => {
    const ctx = yearlyBarChartRef.value.getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['2020', '2021', '2022', '2023', '2024'],
        datasets: [{
          label: 'Yearly Sales',
          data: [2200, 2900, 2780, 3476, 4476],
          backgroundColor: [
            'rgba(255, 99, 132, 0.3)',   // Pink
            'rgba(255, 159, 64, 0.3)',   // Orange
            'rgba(255, 205, 86, 0.3)',   // Yellow
            'rgba(75, 192, 192, 0.3)',   // Teal
            'rgba(54, 162, 235, 0.3)'    // Blue
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 2,
          borderRadius: 0,
          barPercentage: 2,
          categoryPercentage: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              font: {
                size: 14
              }
            }
          },
          tooltip: {
            callbacks: {
              label: context => `$${context.parsed.y.toLocaleString()}`
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: value => `$${value}`,
              font: {
                size: 12
              }
            }
          },
          x: {
            ticks: {
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
  });

  // Map chart 
  const mapChartDiv = ref(null);

  onMounted(() => {
    const root = am5.Root.new(mapChartDiv.value);
    root.setThemes([am5.Theme.new(root)]);

    const chart = root.container.children.push(
      am5map.MapChart.new(root, {
        panX: "none",
        panY: "none",
        wheelY: "none",
        projection: am5map.geoMercator(),
      })
    );

    const polygonSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_cambodiaLow,
      })
    );

    polygonSeries.mapPolygons.template.setAll({
      tooltipText: "{name}",
      interactive: true,
      fill: am5.color(0x1e40af),
    });

    polygonSeries.mapPolygons.template.states.create("hover", {
      fill: am5.color(0x4ade80) 
    });


    return () => {
      root.dispose(); // clean up on unmount
    };
  });

  // Recent order
  const orders = ref([
    { id: 1, orderNo: '001', product: 'iPhone 15', price: 999.00, customer: 'Alice Smith', orderDate: 'July 10, 2025', status: 'Completed' },
    { id: 2, orderNo: '002', product: 'Samsung Galaxy S24', price: 899.00, customer: 'Bob Johnson', orderDate: 'July 10, 2025', status: 'Pending' },
    { id: 3, orderNo: '003', product: 'Google Pixel 9', price: 799.00, customer: 'Charlie Brown', orderDate: 'July 10, 2025', status: 'Cancelled' },
    { id: 4, orderNo: '004', product: 'OnePlus 12', price: 699.00, customer: 'Diana Prince', orderDate: 'July 10, 2025', status: 'Completed' },
    { id: 5, orderNo: '005', product: 'Xiaomi 14', price: 599.00, customer: 'Eve Adams', orderDate: 'July 10, 2025', status: 'Pending' },
    { id: 6, orderNo: '006', product: 'iPhone SE', price: 429.00, customer: 'Frank Green', orderDate: 'July 10, 2025', status: 'Completed' },
    { id: 7, orderNo: '007', product: 'Samsung A55', price: 500.00, customer: 'Grace Hopper', orderDate: 'July 10, 2025', status: 'Pending' },
    { id: 8, orderNo: '008', product: 'Google Pixel 8a', price: 499.00, customer: 'Alan Turing', orderDate: 'July 10, 2025', status: 'Completed' },
    { id: 9, orderNo: '009', product: 'OnePlus Nord', price: 350.00, customer: 'Marie Curie', orderDate: 'July 10, 2025', status: 'Pending' },
    { id: 10, orderNo: '010', product: 'Redmi Note 12', price: 200.00, customer: 'Isaac Newton', orderDate: 'July 10, 2025', status: 'Cancelled' },
  ]);

  // Stores the ID of the currently open dropdown. Null if none are open.
  const openDropdownId = ref(null);

  // Toggles the visibility of a specific dropdown
  const toggleDropdown = (orderId) => {
    if (openDropdownId.value === orderId) {
      openDropdownId.value = null; // Close if already open
    } else {
      openDropdownId.value = orderId; // Open the clicked one
    }
  };

  // Handles clicks outside the dropdown to close it
  const handleClickOutside = (event) => {
    const isClickInsideAnyDropdown = event.target.closest('.relative.inline-block');
    if (!isClickInsideAnyDropdown) {
      openDropdownId.value = null;
    }
  };

  // Defines the text color based on status
  const statusColor = (status) => {
    switch (status) {
      case 'Completed':
        return 'text-green-600';
      case 'Pending':
        return 'text-yellow-600';
      case 'Cancelled':
        return 'text-red-600';
      default:
        return 'text-gray-900';
    }
  };

  // Placeholder for actions like 'View' or 'Delete'
  const performAction = (orderId, action) => {
    alert(`Order #${orderId} - Action: ${action}`);
    // In a real application, you'd emit events, navigate, or make API calls here.
    openDropdownId.value = null; // Close dropdown after action
  };

  // Updates the status of an order
  const updateStatus = (orderId, newStatus) => {
    const orderIndex = orders.value.findIndex(order => order.id === orderId);
    if (orderIndex !== -1) {
      orders.value[orderIndex].status = newStatus;
      alert(`Order #${orderId} status updated to: ${newStatus}`);
    }
    openDropdownId.value = null; // Close dropdown after action
  };

  // Add global click listener when component is mounted
  onMounted(() => {
    document.addEventListener('click', handleClickOutside);
  });

  // Remove global click listener when component is unmounted to prevent memory leaks
  onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
  });

</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

  .font-poppins {
    font-family: 'Poppins', sans-serif;
  }
  
  /*===== animation distribution =====*/
  .animate-marquee {
    animation: marquee 20s linear infinite;
    white-space: nowrap;
  }

  @keyframes marquee {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-100%);
    }
  }

  /* map */
  #mapChartDiv {
    width: 100%;
    height: 100%;
  }

  .hide-scrollbar::-webkit-scrollbar {
    display: none; 
    width: 0;      
    height: 0;     
  }
</style>

