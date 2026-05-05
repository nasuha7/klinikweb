<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6" id="statsContainer"></div>

<script>
    const statsData = [
        { label: 'Total Pasien', value: '1,234', change: '+12%', changeText: 'dari bulan lalu', icon: 'fa-users', bgColor: 'bg-blue-100', iconColor: 'text-blue-500', changeColor: 'text-green-500' },
        { label: 'Total Dokter', value: '25', change: '+3', changeText: 'dokter baru', icon: 'fa-user-md', bgColor: 'bg-green-100', iconColor: 'text-green-500', changeColor: 'text-green-500' },
        { label: 'Janji Temu', value: '156', change: '23', changeText: 'menunggu', icon: 'fa-calendar-check', bgColor: 'bg-purple-100', iconColor: 'text-purple-500', changeColor: 'text-yellow-500' },
        { label: 'Pendapatan', value: 'Rp 50M', change: '+8%', changeText: 'dari bulan lalu', icon: 'fa-money-bill', bgColor: 'bg-yellow-100', iconColor: 'text-yellow-500', changeColor: 'text-green-500' }
    ];
    
    function renderStatsAdmin() {
        let html = '';
        for (const stat of statsData) {
            html += `
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">${stat.label}</p>
                            <p class="text-2xl font-bold text-gray-800">${stat.value}</p>
                            <p class="${stat.changeColor} text-xs mt-1">
                                <i class="fas fa-arrow-up"></i> ${stat.change} ${stat.changeText}
                            </p>
                        </div>
                        <div class="w-12 h-12 ${stat.bgColor} rounded-full flex items-center justify-center">
                            <i class="fas ${stat.icon} text-xl ${stat.iconColor}"></i>
                        </div>
                    </div>
                </div>
            `;
        }
        document.getElementById('statsContainer').innerHTML = html;
    }
    
    renderStatsAdmin();
</script>