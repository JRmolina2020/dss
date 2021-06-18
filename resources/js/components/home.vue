<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 jumbotron">
                <center>
                    <img
                        width="60"
                        height="60"
                        src="https://logodownload.org/wp-content/uploads/2014/09/twitter-logo-2-1.png"
                        alt=""
                    />
                    <h4>Selecciona el hashtags tendencia</h4>
                </center>

                <div class="form-group">
                    <label for=""># Tendencia</label>
                    <select
                        @change="getUnit()"
                        class="form-control"
                        v-model="select"
                    >
                        <option
                            v-for="item in form.select"
                            :key="item.id"
                            :value="item.id"
                            >{{ item.name }}</option
                        >
                    </select>
                </div>
            </div>

            <div class="col-lg-8">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="pills-home-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-home"
                            type="button"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                        >
                            Inicio
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pills-profile-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-profile"
                            type="button"
                            role="tab"
                            aria-controls="pills-profile"
                            aria-selected="false"
                        >
                            Resumen
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                    >
                        <div v-for="item in data" :key="item.id">
                            <h1>
                                <a :href="item.link">{{ item.name }}</a>
                            </h1>

                            <p class="text">
                                Usted ha escogido un tipo de tema tendencia
                                <strong>{{ item.type }}</strong>
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tema</th>
                                        <th>Tweets</th>
                                        <th>Tipo</th>
                                        <th>Lugar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in data" :key="item.id">
                                        <td scope="row">{{ item.name }}</td>
                                        <td>{{ item.re }}</td>
                                        <td>{{ item.type }}</td>
                                        <td>CO</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-for="item in data" :key="item.id">
                            <center>
                                <h5>Distribución de sentimientos</h5>
                                <apexchart
                                    width="480"
                                    type="bar"
                                    :options="chartOptions"
                                    :series="series"
                                ></apexchart>
                            </center>

                            <div class="table-responsive">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Precisión</th>
                                            <th>Exactitud</th>
                                            <th>Sensibilidad</th>
                                            <th>Especificidad</th>
                                            <th>CE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="item in data"
                                            :key="item.id"
                                            class="col-lg-12 jumbotron"
                                        >
                                            <td class="table-primary">
                                                {{ item.pre }}%
                                            </td>
                                            <td>{{ item.ex }}%</td>
                                            <td>{{ item.se }}%</td>
                                            <td>{{ item.es }}%</td>
                                            <td class="table-primary">
                                                {{ me }}%
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="text-justify text">
                                    En el estudio realizado, la
                                    <strong>(precisión) </strong> se toma como
                                    la metrica más importante para evaluar el
                                    comportamiento del modelo,ya que este ítem
                                    de la evaluación representa lo cerca que
                                    está el resultado de la predicción del valor
                                    verdadero.
                                </p>
                                <div v-for="item in data" :key="item.id">
                                    <p
                                        class="text-justify text"
                                        v-if="item.pre > me"
                                    >
                                        Como criterio de éxito se obtiene un
                                        porcentaje de
                                        <strong>{{ item.pre - me }}% </strong>
                                        de diferencia al caso de éxito plateado
                                        en el proyecto.
                                    </p>
                                    <p v-else class="text-justify text">
                                        Como criterio de éxito se obtiene un
                                        porcentaje de
                                        <strong>{{ me - item.pre }}% </strong>
                                        de diferencia al caso de éxito plateado
                                        en el proyecto.
                                    </p>
                                </div>
                            </div>

                            <div id="chart">
                                <center>
                                    <h5>Distribución polar por agrupación</h5>
                                    <apexchart
                                        type="pie"
                                        width="500"
                                        :options="chartOptions2"
                                        :series="series2"
                                    ></apexchart>
                                </center>
                                <p class="text-justify text">
                                    <strong>{{ item.pos }}</strong> usuarios
                                    expresaron comentarios positivos acerca del
                                    tema <strong> {{ item.name }} </strong> ,
                                    <strong> {{ item.neg }} </strong> usuarios
                                    generaron comentarios negativos acerca del
                                    tema <strong>{{ item.name }} </strong>,
                                    <strong>{{ item.mpos }} </strong> usuarios
                                    generaron comentarios muy positivos, a
                                    comparación de los muy negativos que fue un
                                    total de
                                    <strong>{{ item.mneg }} </strong
                                    >comentarios.
                                </p>

                                <p>
                                    <strong>Conclusión: </strong>
                                    {{ sabertext }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                    >
                        <div>
                            <center>
                                <h3>Frecuencia de palabras por tweet</h3>
                            </center>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PALABRA</th>
                                        <th>FREQ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in dataWord" :key="item.id">
                                        <td scope="row">{{ item.name }}</td>
                                        <td>{{ item.pun }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text">
                                En la anterior tabla se representa las palabras
                                más mencionadas en el conjunto de datos
                                extraídos referente al tema tedencia
                            </p>
                            <center>
                                <h3>Ciudades activas</h3>
                            </center>
                            <div id="chart3">
                                <apexchart
                                    type="treemap"
                                    height="350"
                                    :options="chartOptions4"
                                    :series="series4"
                                ></apexchart>
                            </div>

                            <p class="text">
                                En la anterior tabla se representa las ciudades
                                más activas con respecto al tema tendencia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var colors = [
    "#008FFB",
    "#00E396",
    "#FEB019",
    "#FF4560",
    "#775DD0",
    "#546E7A",
    "#26a69a"
];
import Swal from "sweetalert2";
export default {
    name: "home",

    data() {
        return {
            sabertext: "",
            me: 68,
            //star

            chartOptions4: {
                legend: {
                    show: false
                },
                chart: {
                    height: 350,
                    type: "treemap"
                },
                title: {
                    text: "",
                    align: "center"
                },
                colors: [
                    "#3B93A5",
                    "#F7B844",
                    "#ADD8C7",
                    "#EC3C65",
                    "#CDD7B6",
                    "#C1F666",
                    "#D43F97",
                    "#1E5D8C",
                    "#421243",
                    "#7F94B0",
                    "#EF6537",
                    "#C0ADDB"
                ],
                plotOptions: {
                    treemap: {
                        distributed: true,
                        enableShades: false
                    }
                }
            },

            //end city

            chartOptions2: {
                chart: {
                    width: 380,
                    type: "pie"
                },
                labels: ["Positivo", "Negativo", "M.pos", "M.negativo"],
                responsive: [
                    {
                        breakpoint: 180,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                ]
            },
            chartOptions: {
                chart: {
                    id: "vuechart-example",
                    height: 350,
                    type: "bar",
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },
                colors: colors,
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: "45%",
                        distributed: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: [
                        "enojo",
                        "disgustados",
                        "miedo",
                        "alegria",
                        "sorpresa",
                        "neutro",
                        "tristeza"
                    ]
                },

                labels: {
                    style: {
                        colors: colors,
                        fontSize: "12px"
                    }
                }
            },
            //start
            chartOptions3: {
                chart: {
                    width: 400,
                    type: "donut"
                },
                labels: [],
                responsive: [
                    {
                        breakpoint: 580,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                ]
            },

            //end
            //end
            select: 0,
            data: [],
            datapun: [],
            datalet: [],
            dataWord: [],
            dataCity: [],
            form: {
                select: []
            }
        };
    },
    created() {
        this.get();
    },
    computed: {
        series2() {
            for (const item of this.data) {
                var seriesdata2 = [item.pos, item.neg, item.mpos, item.mneg];
            }

            return seriesdata2;
        },

        series() {
            for (const item of this.data) {
                var seriesdata = [
                    {
                        data: [
                            item.anger,
                            item.disgust,
                            item.fear,
                            item.joy,
                            item.surprise,
                            item.neutro,
                            item.sadness
                        ]
                    }
                ];
            }

            return seriesdata;
        },
        series4() {
            for (let i = 0; i < this.dataCity.length; i++) {
                var seriesdata23 = [
                    {
                        data: [
                            {
                                x: "Bogotá",
                                y: this.dataCity[0].pun
                            },
                            {
                                x: "Cali",
                                y: this.dataCity[1].pun
                            },
                            {
                                x: "Medellin",
                                y: this.dataCity[2].pun
                            },
                            {
                                x: "Bucaramanga",
                                y: this.dataCity[3].pun
                            },
                            {
                                x: "Barranquilla",
                                y: this.dataCity[4].pun
                            },
                            {
                                x: "Pereira",
                                y: this.dataCity[5].pun
                            },
                            {
                                x: "Otros",
                                y: this.dataCity[6].pun
                            }
                        ]
                    }
                ];
            }

            return seriesdata23;
        }
    },
    methods: {
        get() {
            axios.get("topics").then(result => {
                this.form.select = result.data;
            });
        },
        getWordunit() {
            axios.get("words/" + this.select).then(result => {
                this.dataWord = result.data;
            });
        },
        getCity() {
            axios.get("cities/" + this.select).then(result => {
                this.dataCity = result.data;
            });
        },

        getUnit() {
            let timerInterval;
            Swal.fire({
                title: "CARGANDO",
                html: "Extrayendo información",
                timer: 9000,
                imageUrl:
                    "https://icons8.com/vue-static/landings/animated-icons/icons/twitter/twitter_200.gif",
                imageHeight: 200,
                imageAlt: "A tall image",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent();
                        if (content) {
                            const b = content.querySelector("b");
                            if (b) {
                                b.textContent = Swal.getTimerLeft();
                            }
                        }
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                    axios.get("topics/" + this.select).then(result => {
                        this.data = result.data;

                        for (const item of this.data) {
                            if (item.pos > item.neg) {
                                this.sabertext = `Hay usuarios más a favor que en contra acerca del tema ${item.name} `;
                            } else {
                                this.sabertext = `Hay usuarios más en contra que a favor acerca del tema ${item.name} `;
                            }
                        }
                    });

                    this.getWordunit();
                    this.getCity();
                }
            }).then(result => {});
        }
    }
};
</script>
<style type="text/css">
.jumbotron {
    padding: 4rem 2rem;
    margin-bottom: 2rem;
    background-color: var(--bs-light);
    border-radius: 0.3rem;
}
.text {
    text-align: justify;
}
</style>
