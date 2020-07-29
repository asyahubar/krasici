<template>
	<div class="image-card" :id="id">
		<div class="frame"
		@click="showModal = true"></div>
		<img class="cards-image" 
		:src="path" 
		:alt="alt" 
		:title="title" 
		@click="showModal = true">
		<ImageModal 
		v-if="showModal" 
		:path="modalPath"
		:alt="alt"
		:title="title"
		:id="modalId"
		@close="showModal = false"></ImageModal>
	</div>
</template>

<script>
import ImageModal from "./ImageModalComponent.vue"

	export default {
		components: {
			ImageModal
		},
		props: {
			path: String,
			modalPath: String,
			alt: String,
			title: String,
			id: String
		},
		data() {
			return {
				"showModal": false
			}
		},
		computed: {
			modalId() {
				return this.id + "-modal";
			}
		}
    }
</script>

<style>
	
</style>