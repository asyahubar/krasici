<template>
    <div id="map-comp">
        <l-map
            style="height: 80%; width: 100%"
            :zoom="zoom"
            :center="center"
            @update:zoom="zoomUpdated"
            @update:center="centerUpdated"
            @update:bounds="boundsUpdated"
            >

            <l-tile-layer :url="url"></l-tile-layer>

            <l-marker 
                v-if="showKrasici" 
                v-for="(place, index) in getKrasici" 
                :key="index"
                :lat-lng="place">
                    <l-icon
                    v-if="index === 'krasici'"
                    :icon-size="iconSize"
                    :icon-anchor="iconAnchor"
                    icon-url="storage/icons/marker-icon-2x-red.png"></l-icon>
                    <l-tooltip v-if="index === 'krasici'">{{ index }}</l-tooltip>
            </l-marker>
            <l-marker 
                v-if="showTourism" 
                v-for="(place, index) in getTourism" 
                :key="index"
                :lat-lng="place">
            </l-marker>
            <l-marker 
                v-if="showArea" 
                v-for="(place, index) in getArea" 
                :key="index"
                :lat-lng="place">
            </l-marker>
        </l-map>
    </div>
</template>

<script>
import L from 'leaflet';
import { LMap, LTileLayer, LMarker, LIcon, LTooltip } from 'vue2-leaflet';

    export default {
        components: {
            LMap,
            LTileLayer,
            LMarker,
            LIcon,
            LTooltip,
        },
        props: {
            showKrasici: {
                type: Boolean,
                default: false,
            },
            showTourism: {
                type: Boolean,
                default: false,
            },
            showArea: {
                type: Boolean,
                default: false,
            }
        },
        data () {
            return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                zoom: 11,
                center: [42.45512772960067, 18.640708923339847],
                bounds: null,
                krasici: [42.410189, 18.644899],
                tivat: [42.430585, 18.6965524],
                kotor: [42.4246602, 18.7706861],
                herceg: [42.4515992, 18.5368563],
                igalo: [42.455701, 18.506443],
                voli: [42.3893729, 18.7388243],
                iconSize: [25, 41],
                iconAnchor: [16, 37],
            };
        },
        computed: {
            getKrasici () {
                return {
                    krasici: this.krasici, 
                    tivat: this.tivat, 
                    kotor: this.kotor, 
                    herceg: this.herceg,
                };
            },
            getTourism () {
                return {
                    krasici: this.krasici,
                    tivat: this.tivat,
                    kotor: this.kotor,
                    herceg: this.herceg, 
                    igalo: this.igalo
                };
            },
            getArea () {
                return {
                    krasici: this.krasici,
                    voli: this.voli
                };
            },
            itIsKrasici (place) {
                return (place === "krasici") ? true : false; 
            },
        },
        methods: {
            zoomUpdated (zoom) {
                this.zoom = zoom;
            },
            centerUpdated (center) {
                this.center = center;
            },
            boundsUpdated (bounds) {
                this.bounds = bounds;
            },
        }
    }
</script>

<style lang="scss">
    #map-comp {
        height: 500px;
        max-width: 800px;
    }

    .leaflet-default-shadow-path {
        background-image: none;
    }

    .vue2leaflet-map {
        height: 100% !important;
        z-index: 0;
    }
</style>
