
<select {{ $attributes->merge(['class' => 'block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-xl shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    {{ $slot }}
</select>
