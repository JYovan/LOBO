<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="row mx-2 my-2">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1">
        <div class="card">
            <div class="card-body">
                <select class="form-control" id="Anio" name="Anio">
                    <option></option>
                    <option value="2018">2018</option>
                </select>
            </div>
        </div>
    </div>
    <!--1-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ventas por mes</h4>
                <canvas id="bar-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <!--2-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ventas por mes</h4>
                <canvas id="line-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <!--3-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ventas por mes</h4>
                <canvas id="pie-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <!--4-->
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ventas por mes</h4>
                <canvas id="mixed-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
</div>
<style>
    .card-body {
        background-color: #fff;
    }
    div.card{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)!important;
    }
</style>
<script>
//    BAR
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
            datasets: [
                {
                    label: "Ventas",
                    backgroundColor: ["#E91E63", "#3F51B5", "#00BCD4", "#4CAF50", "#FFC107", "#795548", "#607D8B", "#F44336", "#8BC34A", "#673AB7", "#03A9F4", "#FF9800"],
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()]
                }
            ]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: 'Ventas en pesos'
            }
        }
    });
//    LINE
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
            datasets: [{
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()],
                    label: "Africa",
                    borderColor: "#BEDE5C",
                    fill: false
                }, {
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()],
                    label: "Asia",
                    borderColor: "#F8DBA6",
                    fill: false
                }, {
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()],
                    label: "Europe",
                    borderColor: "#F76F6F",
                    fill: false
                }, {
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()],
                    label: "Latin America",
                    borderColor: "#B7E6E6",
                    fill: false
                }, {
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()],
                    label: "North America",
                    borderColor: "#FFC926",
                    fill: false
                }
            ]
        },
        options: {
            title: {display: true, text: 'Ventas en pesos'},
            scales: {
                yAxes: [{
                        ticks: {
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return '$' + value;
                            }
                        }
                    }]
            }
        }
    });
//    PIE
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
            datasets: [{
                    label: "$ ",
                    backgroundColor: ["#BEDE5C", "#F8DBA6", "#F76F6F", "#B7E6E6", "#FFC926"],
                    data: [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()]
                }]
        },
        options: {
            title: {
                display: true,
                text: 'Ventas en pesos'
            }
        }
    });
//    MIXED
    var line_data = [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()];
    var bar_data = line_data;
    new Chart(document.getElementById("mixed-chart"), {
        type: 'bar',
        data: {
            labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
            datasets: [{
                    label: "Ventas en pesos",
                    type: "line",
                    borderColor: "#000",
                    data: line_data,
                    fill: false
                }, {
                    label: "Africa",
                    type: "line",
                    borderColor: "#000",
                    data: line_data,
                    fill: false
                }, {
                    label: "Europe",
                    type: "bar",
                    data: bar_data
                }, {
                    label: "Africa",
                    type: "bar",
                    data: bar_data
                }
            ]
        },
        options: {
            title: {display: true, text: 'Ventas en pesos'},
            legend: {display: false}
        }
    });

    function getRandom() {
        return Math.floor((Math.random() * 100000) + 1);
    }
</script>