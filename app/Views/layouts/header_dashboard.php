<div class="w-full fixed top-0 left-0 shadow z-50 bg-white">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-blue-700">DM</h1>
            <div class="grid grid-cols-2 gap-4 items-center">
                <div>
                    <p class="capitalize text-xs">welcome,</p>
                    <p class="text-sm font-semibold"><?php echo session()->get('user') ?></p>
                </div>
                <a href="<?php echo session()->get('logout') ?>">
                    <i class="fa-solid fa-power-off text-base font-bold text-red-700"></i>
                </a>
            </div>
        </div>
    </div>
</div>