<!-- resources/views/admin_dashboard.blade.php -->
<x-app-layout>
    @if(Auth::user()->is_admin === 1)
        <div class="admin-dashboard">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-4xl font-bold mb-8 text-center text-white">Panel de Administración</h1>
                
                <div class="bg-white rounded-lg shadow-lg p-6 bg-opacity-80">
                    <ul>
                        <li class="mb-4">
                            <a href="#" onclick="toggleClassOptions()" class="text-blue-500 hover:text-blue-700 font-semibold">Gestión de clases</a>
                            <div id="class-options" class="hidden mt-4">
                                <a href="{{ route('clases.index') }}" class="block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold mb-2">Crear Clase</a>
                                <a href="{{ route('clases.adminlist') }}" class="block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">Ver Clases</a>
                            </div>
                        </li>
                        <li class="mb-4">
                            <a href="{{ url('/reservas') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Gestión de reservas</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('torneos.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Gestión de torneos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            function toggleClassOptions() {
                var options = document.getElementById('class-options');
                if (options.classList.contains('hidden')) {
                    options.classList.remove('hidden');
                } else {
                    options.classList.add('hidden');
                }
            }
        </script>
    @else
        <script>window.location = "/dashboard";</script>
    @endif
</x-app-layout>
