<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
});

function handleImageError() {
  document.getElementById("screenshot-container")?.classList.add("!hidden");
  document.getElementById("docs-card")?.classList.add("!row-span-1");
  document.getElementById("docs-card-content")?.classList.add("!flex-row");
  document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
  <Head title="Welcome" />
  <div
    class="relative h-screen bg-gradient-to-b from-indigo-950 to-sky-600 flex justify-center items-center"
  >
    <div class="absolute top-5 right-10 w-full z-10">
      <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
          Dashboard
        </Link>

        <template v-else>
          <Link :href="route('login')" class="rounded-md px-3 py-2 text-white">
            Log in
          </Link>

          <Link
            v-if="canRegister"
            :href="route('register')"
            class="rounded-md px-3 py-2 text-white"
          >
            Register
          </Link>
        </template>
      </nav>
    </div>
    <h1 class="text-7xl uppercase font-black text-white">
      EBMC LABORATORY
      <span
        class="bg-gradient-to-b from-red-100 to-teal-400 bg-clip-text text-transparent"
        >FORMS</span
      >
    </h1>
  </div>
</template>
