<template>
    <div class="container">
        {{ this.form.id }}
        <form method="POST" @submit.prevent="add()" autocomplete="off">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for=""># Tendencia</label>
                        <select v-model="form.topic_id" class="form-control">
                            <option
                                v-for="item in data"
                                :key="item.id"
                                :value="item.id"
                                >{{ item.name }}</option
                            >
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">palabra</label>
                        <input
                            type="text"
                            placeholder="palabra"
                            class="form-control"
                            v-model="form.name"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="">puntaje</label>
                    <div class="form-group">
                        <input
                            type="puntaje"
                            placeholder="puntaje"
                            class="form-control"
                            v-model.number="form.pun"
                        />
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <button type="subtmit" class="btn btn-primary btn-xs">
                    Guardar
                </button>
            </div>
        </form>
        <form method="POST" @submit.prevent="addc()" autocomplete="off">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for=""># Tendencia</label>
                        <select v-model="formc.topic_id" class="form-control">
                            <option
                                v-for="item in data"
                                :key="item.id"
                                :value="item.id"
                                >{{ item.name }}</option
                            >
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <select class="form-control" v-model="formc.name">
                            <option>Bogotá</option>
                            <option>Cali</option>
                            <option>Medellin</option>
                            <option value="Bucaramanga">Bucaramanga</option>
                            <option value="Barranquilla">Barranquilla</option>
                            <option value="Pereira">Pereira</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="">puntaje</label>
                    <div class="form-group">
                        <input
                            type="puntaje"
                            placeholder="puntaje"
                            class="form-control"
                            v-model.number="formc.pun"
                        />
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <button type="subtmit" class="btn btn-primary btn-xs">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    name: "topics",
    data() {
        return {
            data: [],

            form: {
                topic_id: null,
                name: "",
                pun: 0
            },
            formc: {
                topic_id: null,
                name: "",
                pun: 0
            }
        };
    },
    created() {
        this.getUnit();
    },
    methods: {
        add() {
            axios.post("words", this.form).then(result => {
                this.form.name = "";
                this.form.pun = null;
            });
        },
        addc() {
            axios.post("cities", this.formc).then(result => {
                this.formc.name = "";
                this.formc.pun = null;
            });
        },
        getUnit() {
            axios.get("topics/").then(result => {
                this.data = result.data;
            });
        }
    }
};
</script>
