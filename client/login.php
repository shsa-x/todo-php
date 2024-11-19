<div class="flex justify-center items-center mt-32">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-3xl font-bold text-center mb-6">Login</h2>
            <form action="./server/request.php" method="POST">
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="you@example.com" required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Your password" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Login</button>
                </div>
            </form>
        </div>
    </div>