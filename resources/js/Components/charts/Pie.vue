<script>
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js'
import { Line } from 'vue-chartjs'

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
)

export default {
    name: 'LineChart',
    components: { Line },
    data() {
        return {
            chartData: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Patients',
                        backgroundColor: '#f87979',
                        data: [40, 39, 10, 40, 39, 80, 40]
                    },
                    {
                        label: 'Rdvs',
                        backgroundColor: '#f8740F',
                        data: [0, 30, 50, 8, 1, 2, 48]
                    }
                ]
            },
            chartOptions: {
                responsive: true
            }
        }
    }
}
</script>
<template>
    <Line id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>