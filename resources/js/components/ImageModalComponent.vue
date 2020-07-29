<template>
	<div :id="id" class="modal-wrapper" @click="$emit('close')">
		<div class="modal">
			<span  
			@click="$emit('close')">
				&times;
			</span>
			<img 
			class="modal-content" 
			:src="path" 
			:alt="alt" 
			:title="title"
			@click.stop>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			path: String,
			alt: String,
			title: String,
			id: String
		},
		methods: {
			close() {
				this.$emit('close');
			}
		}
    }
</script>

<style lang="scss">
	.modal-wrapper {
		position: fixed;
		z-index: 1000;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
		transition: opacity 0.3s ease;

		.modal {
			display: flex;
			flex-direction: column;
			justify-content: flex-end;

			span {
				top: 3rem;
				right: 3rem;
				font-size: 4.5rem;
				cursor: pointer;
				color: white;
				display: inline-flex;
				align-self: center;
			}

			.modal-content {
				max-width: 80rem;
				max-height: 60rem;
				height: 85vh;
				margin: auto; 
				display: block;
				padding: 3px;
				border-radius: 3px;
				object-fit: contain;
				background-color: #EDF2F4;
			}
		}
	}
</style>