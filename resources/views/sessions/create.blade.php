<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Log In</x-form.button>
                    <div class="flex pt-2 pl-1 items-center">
                        <p class="text-xs font-bold">OR</p>
                        <a href="/register" class="ml-2 text-xs font-bold uppercase text-blue-500">Register</a>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>

