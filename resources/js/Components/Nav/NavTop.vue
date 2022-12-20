<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <nav class="bg-white border-b w-full border-gray-100 fixed z-40">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 ">
            <div class="flex justify-between h-16">
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400"
                    >
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <div class="flex items-center ml-auto">
                    <div class="border-l h-16 mr-2"></div>
                    <div class="mx-4 flex items-center justify-center">
                        <div><i class="fa-regular fa-bell fa-lg"></i></div>
                        <div class="bg-[#F58050] w-4 h-4 rounded-full text-xs flex items-center justify-center text-white mb-8 -ml-1">2</div>
                    </div>
                    <div class="border-l h-16">

                    </div>
                    <!-- Settings Dropdown -->
                    <div class="relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        <div class="h-8 w-8 rounded-full bg-gray-700 mr-2 flex items-center justify-center text-white">
                                            <i class="fa-regular fa-user"></i>
                                            </div>
                                            Mr. {{ $page.props.auth.user.name }}
                                        <i
                                            class="ml-2 -mr-0.5 h-4 w-4 fa-solid fa-chevron-down"
                                        ></i>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Se déconnecter
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="sm:hidden z-40"
        >
            <div class="pt-2 pb-3 space-y-1">
                <!-- <ResponsiveNavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    Dashboard
                </ResponsiveNavLink> -->
            </div>
        </div>
    </nav>
</template>
