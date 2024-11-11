<x-app-layout>
    <div class="flex-1 p-10 flex-col">
        <h1 class="text-white font-bold text-2xl">Analytics</h1>

        <div class="grid grid-rows-1 grid-cols-3 gap-4 mt-4">

            <div class="p-4 border-white/20 border rounded-lg">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                </div>
                <h2 class="text-white font-medium">UID</h2>
                <p class="text-white/50">{{ auth()->user()->id }}</p>
            </div>

            <div class="p-4 border-white/20 border rounded-lg">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
                <h2 class="text-white font-medium">Username</h2>
                <p class="text-white/50">{{ auth()->user()->name }}</p>
            </div>

            <div class="p-4 border-white/20 border rounded-lg">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h2 class="text-white font-medium">Profile Views</h2>
                <p class="text-white/50">{{ auth()->user()->profileViews()->count() }}</p>
            </div>

        </div>

        <div class="grid grid-rows-1 grid-cols-1">
            <div class="p-4 border-white/20 border rounded-lg mt-4">
                <canvas id="viewsChart"></canvas>
            </div>

            
        </div>

        @php
            $views = auth()->user()->profileViews()
                ->orderBy('created_at')
                ->get()
                ->groupBy(function($view) {
                    return $view->created_at->format('Y-m-d');
                })
                ->map(function($group) {
                    return $group->count();
                });
        @endphp

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('viewsChart');
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($views->keys()),
                    datasets: [{
                        label: 'Profile Views',
                        data: @json($views->values()),
                        borderColor: 'rgba(255, 255, 255, 0.5)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: 'rgba(255, 255, 255, 0.5)'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.5)'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.5)'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        </script>
    </div>
</x-app-layout>