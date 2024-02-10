/**
 * Analytics Dashboard
 */

'use strict';
(function () {
  let cardColor, headingColor, axisColor, borderColor, shadeColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    headingColor = config.colors_dark.headingColor;
    axisColor = config.colors_dark.axisColor;
    borderColor = config.colors_dark.borderColor;
    shadeColor = 'dark';
  } else {
    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;
    shadeColor = 'light';
  }

  // Report Chart
  // --------------------------------------------------------------------

  // // Radial bar chart functions
  // function radialBarChart(color, value) {
  //   const radialBarChartOpt = {
  //     chart: {
  //       height: 50,
  //       width: 50,
  //       type: 'radialBar'
  //     },
  //     plotOptions: {
  //       radialBar: {
  //         hollow: {
  //           size: '25%'
  //         },
  //         dataLabels: {
  //           show: false
  //         },
  //         track: {
  //           background: borderColor
  //         }
  //       }
  //     },
  //     stroke: {
  //       lineCap: 'round'
  //     },
  //     colors: [color],
  //     grid: {
  //       padding: {
  //         top: -8,
  //         bottom: -10,
  //         left: -5,
  //         right: 0
  //       }
  //     },
  //     series: [value],
  //     labels: ['Progress']
  //   };
  //   return radialBarChartOpt;
  // }

  // const ReportchartList = document.querySelectorAll('.chart-report');
  // if (ReportchartList) {
  //   ReportchartList.forEach(function (ReportchartEl) {
  //     const color = config.colors[ReportchartEl.dataset.color],
  //       series = ReportchartEl.dataset.series;
  //     const optionsBundle = radialBarChart(color, series);
  //     const reportChart = new ApexCharts(ReportchartEl, optionsBundle);
  //     reportChart.render();
  //   });
  // }

  // Analytics - Bar Chart
  // --------------------------------------------------------------------
  const analyticsBarChartEl = document.querySelector('#analyticsBarChart'),
    analyticsBarChartConfig = {
      chart: {
        height: 250,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '50%',
          borderRadius: 3,
          startingShape: 'rounded'
        }
      },
      dataLabels: {
        enabled: false
      },
      colors: [config.colors.primary, config.colors_label.primary],
      series: [
        {
          name: '2020',
          data: [68, 29, 15, 20, 14]
        },
        {
          name: '2019',
          data: [55, 37, 22, 17,9]
        }
      ],
      grid: {
        borderColor: borderColor,
        padding: {
          bottom: -8
        }
      },
      xaxis: {
        categories: ['ممتاز', 'جيد جدا','جيد', 'مقبول', 'راسب'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: axisColor
          }
        }
      },
      yaxis: {
        min: 0,
        max: 100,
        tickAmount: 10,
        labels: {
          style: {
            colors: axisColor
          }
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return ' طالب' + val ;
          }
        }
      }
    };
  if (typeof analyticsBarChartEl !== undefined && analyticsBarChartEl !== null) {
    const analyticsBarChart = new ApexCharts(analyticsBarChartEl, analyticsBarChartConfig);
    analyticsBarChart.render();
  }

// Analytics - Bar Chart
  // --------------------------------------------------------------------
  const analyticsBarChartEl2 = document.querySelector('#analyticsBarChart2'),
    analyticsBarChartConfig2 = {
      chart: {
        height: 250,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '20%',
          borderRadius: 3,
          startingShape: 'rounded'
        }
      },
      dataLabels: {
        enabled: false
      },
      colors: [config.colors.primary, config.colors_label.primary],
      series: [
        {
          name: '2020',
          data: [68, 29, 15, 20, 14,68, 29, 15, 20, 14, 20, 14]
        },
        {
          name: '2019',
          data: [55, 37, 22, 17,9,55, 37, 22, 17,9,55, 37]
        }
      ],
      grid: {
        borderColor: borderColor,
        padding: {
          bottom: -8
        }
      },
      xaxis: {
        categories: ['1', ' 2','3', '4', '5','6','7','8','9','10','11','12'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: axisColor
          }
        }
      },
      yaxis: {
        min: 0,
        max: 100,
        tickAmount: 10,
        labels: {
          style: {
            colors: axisColor
          }
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return ' ' + val + ' طالب';
          }
        }
      }
    };
  if (typeof analyticsBarChartEl2 !== undefined && analyticsBarChartEl2 !== null) {
    const analyticsBarChart2 = new ApexCharts(analyticsBarChartEl2, analyticsBarChartConfig2);
    analyticsBarChart2.render();
  }
 })();
