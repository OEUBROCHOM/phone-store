<template>
  <div class="ecommerce-page bg-gray-100 h-100 p-6 rounded-lg overflow-y-auto;" style="max-height: calc(100vh - 64px);">
    <div class="header text-center mb-6">
      <nav class="text-gray-700 flex justify-between items-center">
        <h1 class="mx-2 hover:text-blue-500" style="font-size: 1.5rem; font-weight: bold;">Brands</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">+Add Brand</button>
      </nav>
    </div>
    <div class="brand-section flex flex-nowrap justify-start gap-4 mb-6 overflow-x-auto scrollbar-hide" style="-ms-overflow-style: none; scrollbar-width: none;">
      <div v-for="brand in brands" :key="brand.name" class="brand flex-shrink-0 flex flex-col items-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg cursor-pointer transition-shadow" @click="selectBrand(brand.name)">
        <img :src="brand.image_url" :alt="brand.name" class="w-12 h-12" />
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
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">iPad & Tablets Case</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Speakers</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Earphones</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Others</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Watch Straps</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Wireless Charger</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Other Case</button>
      <button class="px-4 py-2 bg-white rounded hover:bg-gray-100 text-sm text-gray-700">Headphone</button>
    </div>
    <div class="bg-gray-100 pb-20 rounded-lg" style="width: 100%;">
      <div class="header text-center mb-4 mt-20 p-6">
        <nav class="text-gray-700 flex justify-between items-center">
          <h1 class="mx-2 hover:text-blue-500" style="font-size: 1.5rem; font-weight: bold;">Products</h1>
          <button @click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">+Add Product</button>
        </nav>
      </div>
      <div class="product-section flex flex-wrap justify-center gap-6">
        <div v-for="product in products" :key="product.id" class="product bg-white p-4 rounded-lg shadow-md w-48 text-center relative ">
          <img :src="product.image_url" :alt="product.name" class="w-full h-48 object-cover" />
          <p class="mt-2 text-sm text-gray-700">{{ product.name }}</p>
          <p class="text-sm text-gray-600 ">{{ product.content }}</p>
          <p class="text-lg font-bold text-gray-900">{{ product.price }}</p>
          <p class="text-xs text-gray-500">{{ product.ram }}</p>
          <div class="flex justify-center gap-2 mt-2">
            <button @click="openEditModal(product)" class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-300 transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
              </svg>
            </button>
            <button @click="deleteProduct(product.id)" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal Form -->
    <div v-if="showEditModal" class="fixed inset-0 bg-gray-100 bg-opacity-75 flex items-center justify-center z-50 p-4 sm:p-6">
      <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-100 opacity-100 ease-out">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-6 border-b pb-4 border-gray-200">Edit Products</h2>
        <div v-if="errorMessage" class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg border border-red-200 flex items-center gap-2">
          <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
          </svg>
          <span>{{ errorMessage }}</span>
        </div>
        <div v-if="successMessage" class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg border border-green-200 flex items-center gap-2">
          <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <span>{{ successMessage }}</span>
        </div>
        <form @submit.prevent="updateProduct" enctype="multipart/form-data" class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
              <input id="name" v-model="editForm.name" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
            <div>
              <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
              <input id="price" v-model="editForm.price" type="number" step="0.01" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
          </div>

          <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
            <textarea id="content" v-model="editForm.content" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label for="ram" class="block text-sm font-medium text-gray-700 mb-1">RAM</label>
              <input id="ram" v-model="editForm.ram" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div>
              <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
              <select id="brand" v-model="editForm.brand_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                <option value="" disabled>Select a brand</option>
                <option v-for="brand in brands" :key="brand.name" :value="brand.id">{{ brand.name }}</option>
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <div class="flex items-center space-x-4">
              <input type="file" accept="image/jpeg,image/png" @change="handleFileChange" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
              <img v-if="editForm.image_url" :src="editForm.image_url" class="w-20 h-20 object-cover rounded-lg shadow-md" alt="Product Image" />
            </div>
          </div>

          <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
            <button type="button" @click="closeEditModal" class="inline-flex items-center px-5 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-red-200 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
              Cancel
            </button>
            <button type="submit" class="inline-flex items-center px-5 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>


    <!-- Create Products form -->
    <div v-if="showCreateModal" class="fixed inset-0 bg-gray-100 bg-opacity-75 flex items-center justify-center z-50 p-4 sm:p-6">
      <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-100 opacity-100 ease-out">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-6 border-b pb-4 border-gray-200">Create Product</h2>
        <div v-if="errorMessage" class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg border border-red-200 flex items-center gap-2">
          <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
          </svg>
          <span>{{ errorMessage }}</span>
        </div>
        <div v-if="successMessage" class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg border border-green-200 flex items-center gap-2">
          <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <span>{{ successMessage }}</span>
        </div>
        <form @submit.prevent="createProduct" enctype="multipart/form-data" class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label for="create-name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
              <input id="create-name" v-model="createForm.name" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
            <div>
              <label for="create-price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
              <input id="create-price" v-model="createForm.price" type="number" step="0.01" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
          </div>
          <div>
            <label for="create-content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
            <textarea id="create-content" v-model="createForm.content" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
              <label for="create-ram" class="block text-sm font-medium text-gray-700 mb-1">RAM</label>
              <input id="create-ram" v-model="createForm.ram" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div>
              <label for="create-brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
              <select id="create-brand" v-model="createForm.brand_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                <option value="" disabled>Select a brand</option>
                <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
              </select>
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <div class="flex items-center space-x-4">
              <input type="file" accept="image/jpeg,image/png" @change="handleCreateFileChange" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
              <img v-if="createForm.image_url" :src="createForm.image_url" class="w-20 h-20 object-cover rounded-lg shadow-md" alt="Product Image" />
            </div>
          </div>
          <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
            <button type="button" @click="closeCreateModal" class="inline-flex items-center px-5 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-red-200 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
              Cancel
            </button>
            <button type="submit" class="inline-flex items-center px-5 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
              Create Product
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Confirm delete -->
    <div v-if="showDeleteModal" class="fixed inset-0 bg-blue-100 bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50 p-4">
      <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-xl border border-gray-100 max-w-md w-full mx-auto">
        <div class="p-8 text-center">
          <div class="text-red-500 mb-4">
            <svg class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </div>
          <h3 class="text-3xl font-extrabold text-gray-900 mb-3">Confirm Permanent Deletion?</h3>
          <p class="text-lg text-gray-700 leading-relaxed">
            This action will irreversibly delete the selected product and all related data. Please ensure this is what you intend.
          </p>
        </div>
        <div class="bg-gray-100 p-6 flex justify-end gap-4 rounded-b-2xl">
          <button @click="showDeleteModal = false" class="px-6 py-3 rounded-full border border-gray-300 text-gray-800 font-semibold hover:bg-gray-200 transition-all duration-300 ease-in-out shadow-sm">
            Keep Product
          </button>
          <button @click="confirmDelete" class="px-6 py-3 rounded-full bg-red-600 text-white font-semibold hover:bg-red-700 transition-all duration-300 ease-in-out shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Delete Permanently
          </button>
        </div>
      </div>
    </div>
  </div>
   
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const products = ref([]);
const brands = ref([]);
const showEditModal = ref(false);
const showCreateModal = ref(false);
const showDeleteModal = ref(false);
const deleteProductId = ref(null);

const deleteProduct = async (id) => {
  deleteProductId.value = id;
  showDeleteModal.value = true;
};
const editForm = ref({
  id: null,
  name: '',
  content: '',
  price: '',
  ram: '',
  brand_id: '',
  image: null,
  image_url: ''
});

const createForm = ref({
  name: '',
  content: '',
  price: '',
  ram: '',
  brand_id: '',
  image: null,
  image_url: ''
});

const errorMessage = ref('');
const successMessage = ref('');
const initCsrf = async () => {
  try {
    await axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie', {
      withCredentials: true
    });
  } catch (error) {
    console.error('Failed to fetch CSRF cookie:', error);
  }
};

// Fetch products
const fetchProducts = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/products', {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('sanctum_token')}`,
        Accept: 'application/json'
      }
    });
    products.value = response.data.data || response.data;
  } catch (error) {
    console.error('Failed to fetch products:', error);
    errorMessage.value = 'Failed to load products.';
  }
};

// Fetch brands (assuming you have a /brands endpoint)
const fetchBrands = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/brands', {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('sanctum_token')}`,
        Accept: 'application/json'
      }
    });
    brands.value = response.data.data || response.data;
    console.log(response.data)
  } catch (error) {
    console.error('Failed to fetch brands:', error);
    // Fallback to static brands if API fails
    brands.value = [
      { id: 1, name: 'Apple', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg' },
      { id: 2, name: 'Samsung', imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg' },
      // Add other brands with proper IDs
    ];
  }
};

// Open edit modal and populate form
const openEditModal = (product) => {
  editForm.value = {
    id: product.id,
    name: product.name,
    content: product.content || '',
    price: product.price,
    ram: product.ram || '',
    brand_id: product.brand_id,
    image: null,
    image_url: product.image_url
  };
  showEditModal.value = true;
  errorMessage.value = '';
  successMessage.value = '';
};

// Close edit modal
const closeEditModal = () => {
  showEditModal.value = false;
  editForm.value = { id: null, name: '', content: '', price: '', ram: '', brand_id: '', image: null, image_url: '' };
};

// Handle file input change
const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    editForm.value.image = file;
    editForm.value.image_url = URL.createObjectURL(file); // Preview image
  }
};
const handleCreateFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    createForm.value.image = file;
    createForm.value.image_url = URL.createObjectURL(file);
  }
};

// Update product
const updateProduct = async () => {
  try {
    await initCsrf();
    const formData = new FormData();
    formData.append('name', editForm.value.name);
    formData.append('content', editForm.value.content);
    formData.append('price', editForm.value.price);
    formData.append('ram', editForm.value.ram);
    formData.append('brand_id', editForm.value.brand_id);
    if (editForm.value.image) {
      formData.append('image', editForm.value.image);
    }
    formData.append('_method', 'PUT'); // Laravel requires this for PUT requests with FormData

    const response = await axios.post(`http://127.0.0.1:8000/api/products/${editForm.value.id}`, formData, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('sanctum_token')}`,
        'Content-Type': 'multipart/form-data',
        Accept: 'application/json'
      }
    });

    // Update the product in the local list
    const updatedProduct = response.data.product;
    const index = products.value.findIndex(p => p.id === updatedProduct.id);
    if (index !== -1) {
      products.value[index] = updatedProduct;
    }

    successMessage.value = 'Product updated successfully!';
    setTimeout(() => closeEditModal(), 1500);
  } catch (error) {
    console.error('Failed to update product:', error);
    errorMessage.value = error.response?.data?.message || 'Failed to update product.';
  }
};

// Select brand
const selectBrand = (brand) => {
  // Add logic to filter products by brand if needed
  console.log('Selected brand:', brand);
};

// Create products
const createProduct = async () => {
  try {
    const formData = new FormData();
    formData.append('name', createForm.value.name);
    formData.append('content', createForm.value.content);
    formData.append('price', createForm.value.price);
    formData.append('ram', createForm.value.ram);
    formData.append('brand_id', createForm.value.brand_id);
    if (createForm.value.image) {
      formData.append('image', createForm.value.image);
    }

    const response = await axios.post('http://127.0.0.1:8000/api/products', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
        Accept: 'application/json'
      }
    });

    products.value.push(response.data.product);
    successMessage.value = 'Product created successfully!';
    setTimeout(() => closeCreateModal(), 1500);
  } catch (error) {
    console.error('Failed to create product:', error.response?.data);
    errorMessage.value = error.response?.data?.message || 'Failed to create product.';
  }
};
const openCreateModal = () => {
  createForm.value = {
    name: '',
    content: '',
    price: '',
    ram: '',
    brand_id: '',
    image: null,
    image_url: ''
  };
  showCreateModal.value = true;
  errorMessage.value = '';
  successMessage.value = '';
};
const closeCreateModal = () => {
  showCreateModal.value = false;
  createForm.value = { name: '', content: '', price: '', ram: '', brand_id: '', image: null, image_url: '' };
};

// Delete product
const confirmDelete = async () => {
  try {
    await initCsrf(); // add this line

    await axios.delete(`http://127.0.0.1:8000/api/products/${deleteProductId.value}`, {
      headers: {
        Authorization: `Bearer ${localStorage.getItem('sanctum_token')}`,
        Accept: 'application/json'
      },
    });

    products.value = products.value.filter(product => product.id !== deleteProductId.value);
    successMessage.value = 'Product deleted successfully!';
    setTimeout(() => { successMessage.value = ''; }, 1500);
  } catch (error) {
    console.error('Failed to delete product:', error.response?.data);
    errorMessage.value = error.response?.data?.message || 'Failed to delete product.';
    setTimeout(() => { errorMessage.value = ''; }, 3000);
  }
  showDeleteModal.value = false;
  deleteProductId.value = null;
};

// Fetch data on mount
onMounted(() => {
  fetchProducts();
  fetchBrands();
});
</script>

<style scoped>
.hide-scrollbar::-webkit-scrollbar {
  display: none;
  width: 0;
  height: 0;
}
</style>