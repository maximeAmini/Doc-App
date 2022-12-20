<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import NavLink from "@/Components/NavLink.vue";
</script>
<template>
    <nav
        class="hidden sm:block h-screen border-r border-gray-100 fixed bg-white w-52 z-50"
    >
        <h1 class="font-bold text-xl text-center px-4 pt-4">Smart Doc</h1>

        <div class="img h-40 flex text-white">
            <div class="font-bold text-xl p-4 mt-auto">
                <p class="font-thin">Bonjour</p>
                <p>Mr. {{ $page.props.auth.user.name }}</p>
            </div>
        </div>

        <!-- admin nav -->
        <div class="w-full flex flex-col items-center p-4" v-if="$page.props.auth.user.role=='admin'">
            <NavLink
                :href="route('admin')"
                :active="route().current('admin')"
            >
                <i class="fa-solid fa-heart-pulse mr-2"></i> Tableau de bord
            </NavLink>
            <NavLink
                :href="route('medecins.index')"
                :active="route().current('medecins.index') || route().current('medecins.create') || route().current('medecins.edit') || route().current('medecins.show')"
            >
                <i class="fa-solid fa-user-doctor mr-2"></i> Médecins
            </NavLink>
            <NavLink
                :href="route('receptionnistes.index')"
                :active="route().current('receptionnistes.index') || route().current('receptionnistes.create') || route().current('receptionnistes.edit') || route().current('receptionnistes.show')"
            >
                <i class="fa-solid fa-user-tie mr-2"></i> Réceptionnistes
            </NavLink>
        </div>

        <!-- recep nav -->
        <div class="w-full flex flex-col items-center p-4" v-if="$page.props.auth.user.role=='receptionniste'">
            <NavLink
                :href="route('receptionniste')"
                :active="route().current('receptionniste')"
            >
                <i class="fa-solid fa-heart-pulse mr-2"></i> Tableau de bord
            </NavLink>
            <NavLink
            :href="route('patients.index')"
                :active="route().current('patients.index') || route().current('patients.create') || route().current('patients.edit') || route().current('patients.show')"
            >
            <i class="fa-solid fa-hospital-user mr-2"></i> Patient
            </NavLink>
            <NavLink
            :href="route('rdvs.index')"
                :active="route().current('rdvs.index') || route().current('rdvs.create') || route().current('rdvs.edit') || route().current('rdvs.show')"
            >
            <i class="fa-solid fa-calendar-days mr-2"></i> Rendez-vous
            </NavLink>
        </div>




        

        <div class="w-full absolute bottom-0 p-4 border-t">
                <NavLink
                :href="route('logout')" method="post"
                >
                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Se déconnecter
                </NavLink>
        </div>
    </nav>
</template>

<style scoped>
.img {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1029%26quot%3b)' fill='none'%3e%3cpath d='M1488 560L0 560 L0 131.32Q93.29 104.61%2c 120 197.9Q199.21 205.11%2c 192 284.32Q258.44 230.76%2c 312 297.21Q348.99 214.2%2c 432 251.19Q398.5 145.69%2c 504 112.2Q573.88 62.08%2c 624 131.95Q752.36 140.31%2c 744 268.67Q736.16 188.83%2c 816 180.99Q869.42 114.42%2c 936 167.84Q976.48 88.32%2c 1056 128.8Q1123.38 76.18%2c 1176 143.56Q1288.84 136.4%2c 1296 249.24Q1319.34 200.57%2c 1368 223.91Q1412.02 147.93%2c 1488 191.94z' fill='rgba(255%2c 124%2c 80%2c 1)'%3e%3c/path%3e%3cpath d='M1512 560L0 560 L0 315.42Q14.51 257.93%2c 72 272.44Q116.46 244.9%2c 144 289.37Q289.69 315.06%2c 264 460.75Q254.06 330.81%2c 384 320.86Q426.95 243.81%2c 504 286.76Q533.87 244.63%2c 576 274.49Q656.35 234.84%2c 696 315.18Q799.71 298.89%2c 816 402.6Q840.33 354.93%2c 888 379.26Q938.61 309.87%2c 1008 360.48Q1055.6 288.08%2c 1128 335.67Q1193.7 281.38%2c 1248 347.08Q1305.59 332.67%2c 1320 390.26Q1347.41 345.67%2c 1392 373.08Q1466.64 327.73%2c 1512 402.37z' fill='rgba(100%2c 58%2c 106%2c 1)'%3e%3c/path%3e%3cpath d='M1560 560L0 560 L0 444.59Q76.5 449.09%2c 72 525.59Q140.63 474.23%2c 192 542.86Q257.86 536.72%2c 264 602.58Q278.21 544.79%2c 336 559Q359.76 462.76%2c 456 486.52Q479.83 438.35%2c 528 462.18Q569.91 432.09%2c 600 474Q647.28 401.28%2c 720 448.56Q746.32 402.88%2c 792 429.21Q822.2 387.41%2c 864 417.61Q917.06 398.67%2c 936 451.72Q988.49 384.21%2c 1056 436.69Q1080.94 389.63%2c 1128 414.58Q1184.47 399.05%2c 1200 455.53Q1314.95 450.49%2c 1320 565.44Q1404.05 529.49%2c 1440 613.54Q1491.77 545.31%2c 1560 597.07z' fill='rgba(234%2c 223%2c 222%2c 1)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1029'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
    background-size: cover;
}
</style>
