<template>
  <div class="container mx-auto px-4">
    <nav class="rounded-xl w-full z-30 top-10 py-1 bg-white shadow-lg mt-7">
      <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
         <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
               <title>menu</title>
               <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
         </label>
         <input class="hidden" type="checkbox" id="menu-toggle">

         <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
               <ul class="md:flex items-center justify-between text-base text-gray-600 pt-4 md:pt-0">
                  <li>
                    <router-link class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" to="/registro-ponto">Registro ponto</router-link>
                  </li>
                  <li>
                    <router-link class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" to="/colaboradores">Colaboradores</router-link>
                  </li>
                  <li>
                    <router-link class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" to="/usuarios">Usuários</router-link>
                  </li>
                  <li>
                    <router-link class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" to="/feriados">Feriados</router-link>
                  </li>
               </ul>
            </nav>
         </div>

         <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
            <div class="auth flex items-center w-full md:w-full">
              <button class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Logout</button>
              <router-link class="bg-gray-600 text-white p-2 rounded hover:bg-gray-500 hover:text-gray-100" to="/login">Login</router-link>
            </div>
         </div>
      </div>
    </nav>
    <router-view/>
  </div>
</template>

<style>

</style>
