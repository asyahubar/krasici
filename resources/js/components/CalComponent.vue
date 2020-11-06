<template>
	<div id="cal-comp">
		<vue-cal 
		ref="calendar"
		hide-view-selector 
		:time="false" 
		active-view="month" 
		small 
		:locale="locale" 
		class="vuecal--date-picker vuecal--rounded-theme" 
		:disable-views="['years', 'year', 'week', 'day']"
		:events="events"
		:on-event-click="onEventClick"
		events-count-on-year-view>
			<!-- <i v-slot:arrow-prev aria-hidden="true" class="v-icon material-icons">arrow_back</i> -->
			<!-- <i v-slot:arrow-next aria-hidden="true" class="v-icon material-icons">arrow_forward</i> -->
		</vue-cal>
	</div>
</template>
<script>
import VueCal from 'vue-cal';

// TODO: from start and end date, create an array of all dates in between to lated put them all in an array that would be passed to vue-cal and disabled

	export default {
		components: {
			VueCal,
		},
		props: {
			locale: String,
		},
		data() {
			return {
				events: [
					{
						start: '2020-09-12',
				    	end: '2020-09-26',
				    	title: 'Owners stay',
				    	content: '',
				    	class: 'booked-period',
					},
				],
				calendar: '',
			};
		},
		mounted () {
			this.$nextTick(function () {
		    	this.markBooked();
		  	})
		},
		methods: {
			markBooked() {
				let cal = this.$refs.calendar;
				console.log(cal);
				
			},
			onEventClick(event, e) {

			},
		},
	}
</script>