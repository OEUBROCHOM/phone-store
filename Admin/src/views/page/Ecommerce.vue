<template>
  <div class="ecommerce-page bg-gray-100 h-100 p-6 rounded-lg overflow-y-auto;" style="max-height: calc(100vh - 64px);">
    <div class="header text-center mb-6">
        <nav class="text-gray-700 flex justify-between items-center">
            <h1 class="mx-2 hover:text-blue-500 " style="font-size: 1.5rem; font-weight: bold;">Brands</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">+Add Brand</button>
        </nav>
    </div>
   <div class="brand-section flex flex-nowrap justify-start gap-4 mb-6 overflow-x-auto scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
        <div v-for="brand in brands" :key="brand.name" class="brand flex-shrink-0 flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg cursor-pointer transition-shadow" @click="selectBrand(brand.name)">
            <img :src="brand.imageUrl" :alt="brand.name" class="w-12 h-12" />
            <span class="mt-2 text-sm text-gray-700">{{ brand.name }}</span>
        </div>
    </div>
    
    <div class="category-section flex flex-wrap justify-center gap-4 mb-6 bg-gray-200 p-4 rounded-lg">
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">iPhone</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">iPad</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Apple Watch</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">MacBook</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">EarBuds</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">OTG/SD/Memory</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Adapter & Cable</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Phone Case</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">iPad & Tables Case</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Speakers</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Earphones</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Others</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Watch Straps</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Wireless Charger</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Other Case</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Headphone</button>
    </div>
    <div class="bg-gray-100 rounded-lg" style="widows: 100%;">
        <div class="header text-center mb-6 mt-20 p-6 ">
            <nav class="text-gray-700 flex justify-between items-center">
                <h1 class="mx-2 hover:text-blue-500 " style="font-size: 1.5rem; font-weight: bold;">Products</h1>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">+Add Product</button>
            </nav>
        </div>
        <div class="product-section flex flex-wrap justify-center gap-6">
            <div v-for="product in products" :key="product.name" class="product bg-white p-4 rounded-lg shadow-md w-48 text-center relative">
                <img :src="product.imageUrl" :alt="product.name" class="w-full h-48 object-cover" />
                <p class="mt-2 text-sm text-gray-700">{{ product.name }}</p>
                <p class="text-sm text-gray-600">{{ product.content }}</p>
                <p class="text-lg font-bold text-gray-900">{{ product.price }}</p>
                <p class="text-xs text-gray-500">{{ product.ram }}</p>
                <div class="flex justify-center gap-2 mt-2">
                <button class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-300 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                    </svg>
                </button>
                <button class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                    </svg>
                </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const selectedBrand = ref('');
const brands = ref([
  { name: 'Apple', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg' },
  { name: 'Samsung', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg' },
  { name: 'Asus', imageUrl: 'https://i.pinimg.com/736x/d6/c9/cf/d6c9cf631d0300426f36ed78ad86ce14.jpg' },
  { name: 'Google', imageUrl: 'https://i.pinimg.com/1200x/69/5a/40/695a40e7825410c446c4ce04f0d95bea.jpg' },
  { name: 'Honor', imageUrl: 'https://i.pinimg.com/736x/e4/1f/96/e41f967a340e780f6a7cf0ce8eebddd1.jpg' },
  { name: 'Huawei', imageUrl: 'https://i.pinimg.com/736x/2d/b8/de/2db8debaf71118ae77c4b8f1943becb4.jpg' },
  { name: 'Infinix', imageUrl: 'https://i.pinimg.com/1200x/98/a3/2e/98a32e0ef25e6148b8a08954956eb0e4.jpg' },
  { name: 'Nokia', imageUrl: 'https://i.pinimg.com/736x/aa/0b/45/aa0b45c47f990665507d345817caae3d.jpg' },
  { name: 'Nothing', imageUrl: 'https://i.pinimg.com/736x/4b/ad/8d/4bad8d729eca82fce2b6fdea434677be.jpg' },
  { name: 'OnePlus', imageUrl: 'https://i.pinimg.com/1200x/40/62/cc/4062cc7820c6161edb604295733f3fa3.jpg' },
  { name: 'Nubia', imageUrl: 'https://i.pinimg.com/1200x/44/7e/f4/447ef4c8da58cb547c9a5a1f939f8c7c.jpg' },
  { name: 'Oppo', imageUrl: 'https://i.pinimg.com/1200x/75/6d/e8/756de87b9b6964578c02a3f6681afe70.jpg' },
  { name: 'Realme', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Realme_logo.svg' },
  { name: 'RedMagic', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/5/5e/RedMagic_Logo.png' },
  { name: 'Tecno', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Tecno_Mobile_Logo.svg' },
  { name: 'Vivo', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/3/36/Vivo_logo.svg' },
  { name: 'Xiaomi', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Xiaomi_Logo.svg' },
  { name: 'Sony', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/27/Sony_logo.svg' },
  { name: 'Xundd', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Ahastyle', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Amazfit', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Amazfit_Logo.svg' },
  { name: 'Anker', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/5/5e/Anker_Logo.svg' },
  { name: 'Benks', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Cotec', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Foneng', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Hoco', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'JBL', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/2f/JBL_Logo.svg' },
  { name: 'Lenyes', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Marshall', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/9/94/Marshall_Amplification_logo.svg' },
  { name: 'Microsoft', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg' },
  { name: 'Nillkin', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
  { name: 'Remax', imageUrl: 'https://via.placeholder.com/50' }, // Placeholder, replace with actual URL
]);

const products = ref([
  { name: 'Mac Mini', content: 'Apple Mac Mini M4', price: '$699 - $619', ram: '256G-16G (Off-70S)', imageUrl: 'https://i.pinimg.com/1200x/6b/d4/d4/6bd4d445b8311b60ca63f81eb2c1cfee.jpg' },
  { name: 'iPhone 16 Pro', content: 'iPhone 16 Pro Falcon', price: '$1,545 - $1,219', ram: 'Best Seller', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
  { name: 'iPhone 16', content: 'iPhone 16 (Offer)', price: '$1,269 - $1,039', ram: '200G', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
  { name: 'iPhone 16 Pro Max', content: 'iPhone 16 Pro Max SIM2', price: '$1,279', ram: '(New Offer)', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
  { name: 'iPhone 16 Pro', content: 'iPhone 16 Pro 16', price: '$929', ram: 'Max CH/A SIM2 (New Offer)', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
  { name: 'iPhone 16', content: 'iPhone 16 Pro Max (USA)', price: '$1,169 - $1,089', ram: 'LL/A 2-eSIMs', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
  { name: 'Huawei Watch FIT 4 Pro', content: 'Fashion Active', price: '$279', ram: '200G', imageUrl: 'https://i.pinimg.com/736x/b3/e6/ae/b3e6aeaa47709e1e4d23a7b2776b9b12.jpg' },
]);

const selectBrand = (brand) => {
  selectedBrand.value = brand;
  // Add logic to filter products by brand if needed
  // Example: products.value = products.value.filter(p => p.brand === brand);
};
</script>

<style scoped>
.hide-scrollbar:-webkit-scrollbar {
    display: none; 
    width: 0;      
    height: 0;     
  }
</style>