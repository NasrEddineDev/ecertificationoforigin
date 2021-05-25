// Dashboard 1 Morris-chart

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2018',
            Python: 0,
            PHP: 0,
            Java: 0
        }, {
            period: '2019',
            Python: 100,
            PHP: 80,
            Java: 65
        }, {
            period: '2020',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2021',
            Python: 100,
            PHP: 70,
            Java: 40
        }, {
            period: '2022',
            Python: 180,
            PHP: 150,
            Java: 120
        }, {
            period: '2023',
            Python: 100,
            PHP: 70,
            Java: 40
        },
         {
            period: '2024',
            Python: 180,
            PHP: 150,
            Java: 120
        }],
        xkey: 'period',
        ykeys: ['Python', 'PHP', 'Java'],
        labels: ['Python', 'PHP', 'Java'],
        pointSize: 0,
        fillOpacity: 0.99,
        pointStrokeColors:['#65b12d', '#933EC5 ', '#006DF0'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth:0,
        hideHover: 'auto',
        lineColors: ['#65b12d', '#933EC5 ', '#006DF0'],
        resize: true
        
    });
	
Morris.Area({
        element: 'extra-area-chart',
        data: [{
            period: '2018',
            GZALE: 50,
            ACP_ALGERIA_TUNISIA: 80,
            PAN_EUROMED: 20
        }, {
            period: '2019',
            GZALE: 130,
            ACP_ALGERIA_TUNISIA: 100,
            PAN_EUROMED: 80
        }, {
            period: '2020',
            GZALE: 80,
            ACP_ALGERIA_TUNISIA: 60,
            PAN_EUROMED: 70
        }, {
            period: '2021',
            GZALE: 70,
            ACP_ALGERIA_TUNISIA: 200,
            PAN_EUROMED: 140
        }, {
            period: '2022',
            GZALE: 180,
            ACP_ALGERIA_TUNISIA: 150,
            PAN_EUROMED: 140
        }, {
            period: '2023',
            GZALE: 105,
            ACP_ALGERIA_TUNISIA: 100,
            PAN_EUROMED: 80
        },
         {
            period: '2024',
            GZALE: 250,
            ACP_ALGERIA_TUNISIA: 150,
            PAN_EUROMED: 200
        }],
        xkey: 'period',
        ykeys: ['GZALE', 'ACP_ALGERIA_TUNISIA', 'PAN_EUROMED'],
        labels: ['GZALE', 'ACP_ALGERIA_TUNISIA', 'PAN_EUROMED'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#006DF0', '#933EC5', '#65b12d'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#006DF0', '#933EC5', '#65b12d'],
        resize: true
        
    });