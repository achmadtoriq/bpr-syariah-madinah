<!-- <div class="h-screen flex flex-1 justify-center items-center">
    <div class="max-w-xl border rounded-lg p-5">
        <h2>Login</h2>
        <?php // if (session()->getFlashdata('error')):
        ?>
            <p><?= session()->getFlashdata('error') ?></p>
        <?php // endif;
        ?>
        <form method="post" action="/login">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
    </div>
</div> -->

<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex h-screen min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center mb-5">
        <i class="fa-solid fa-power-off text-6xl font-bold text-blue-700"></i>
        <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <?php if (session()->getFlashdata('error')):
    ?>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm border border-red-500 bg-red-100 rounded-lg p-2 mt-5">
            <p class="text-base/9 tracking-tight text-red-500"><?= session()->getFlashdata('error') ?></p>
        </div>
    <?php endif;
    ?>

    <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="/login" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="username" type="text" name="username" required autocomplete="username" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
            </div>
        </form>
    </div>
</div>