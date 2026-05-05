<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8" id="statsCardsContainer"></div>

<script>
    const statsPasien = [
        { label: 'Janji Temu', value: '2', subText: 'Aktif', icon: 'fa-calendar-check', color: 'border-blue-500', iconColor: 'text-blue-500' },
        { label: 'Konsultasi', value: '8', subText: 'Total', icon: 'fa-history', color: 'border-green-500', iconColor: 'text-green-500' },
        { label: 'Resep Obat', value: '3', subText: 'Aktif', icon: 'fa-prescription', color: 'border-purple-500', iconColor: 'text-purple-500' }
    ];
    
    let html = '';
    for (const stat of statsPasien) {
        html += `
            <div class="bg-white rounded-xl p-4 shadow-sm border-l-4 ${stat.color}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">${stat.label}</p>
                        <p class="text-2xl font-bold text-gray-800">${stat.value}</p>
                        <p class="text-gray-500 text-xs">${stat.subText}</p>
                    </div>
                    <i class="fas ${stat.icon} text-2xl ${stat.iconColor}"></i>
                </div>
            </div>
        `;
    }
    document.getElementById('statsCardsContainer').innerHTML = html;
</script>