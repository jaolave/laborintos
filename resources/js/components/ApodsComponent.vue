<template>
  <div>
    <vue-horizontal-list :items="apods" :options="options">
      <template v-slot:default="{ item, itemIndex }" >
        <div>
          <div class="image-container">
            <div class="image-content" @click="moreInfo(item)">
              <img :src=item.url />
              <div class="image-text">
                <h2>{{item.title}}</h2>
              </div>
            </div>
          </div>
          <div class="subtitle" >{{item.date}}</div>
          <p>{{item.explanation}}</p>
        </div>
      </template>
    </vue-horizontal-list>
  </div>
</template>

<script>
	import ApodDetailComponent from './ApodDetailComponent';
	import VueHorizontalList from "vue-horizontal-list";
	import FullpageModal from 'vue-fullpage-modal';
	Vue.use(FullpageModal);
	let apiUrl = process.env.MIX_API_URL;
	
	export default {
		components: {
			VueHorizontalList,
		},
		data() {
		  return {
			  apods: [],
			  options: {
				responsive: [
				  { end: 576, size: 1 },
				  { start: 576, end: 768, size: 2 },
				  { start: 768, end: 992, size: 3 },
				  { size: 4 },
				],
				position: {
				  start: 0
				},
				autoplay: { play: true, repeat: true, speed: 4000 },
			  }
		  }
		},
		created() {
			axios
			  .get(apiUrl)
			  .then(response => {
				  this.apods = response.data;
			 });
			 console.log(apiUrl);
		},
		methods: {
		  moreInfo: function (item, event) {
			this.$FModal.show(
			{ 
				component: ApodDetailComponent
			},
			//componentPropsOrAttrs
			{
				url: item.url, 
				title: item.title,
				explanation: item.explanation,
				date: item.date,
				copyright: item.copyright,
			}
			)
		  }
		}
	  
	};
</script>

<style scoped>
	p,
	h3,
	h2 {
	  margin-top: 4px;
	  overflow: hidden;
	  display: -webkit-box;
	  text-overflow: ellipsis;
	  word-break: break-word;
	  -webkit-box-orient: vertical;
	  -webkit-line-clamp: 2;
	}
	.subtitle {
	  margin-top: 10px;
	  font-size: 12px;
	  font-weight: 600;
	  color: black;
	  margin-bottom: 8px;
	}
	.image-container {
	  border-radius: 3px;
	  overflow: hidden;
	  position: relative;
	  width: 100%;
	  padding-top: 120%;
	}
	.image-content {
	}
	.image-text {
	  position: absolute;
	  left: 0;
	  right: 0;
	  top: 0;
	  bottom: 0;
	  padding: 32px 24px;
	  display: flex;
	  align-items: flex-end;
	  background: rgba(0, 0, 0, 0.4);
	}
	.image-text h2 {
	  margin: 0;
	  color: white;
	  text-align: center;
	}
	img {
	  object-fit: cover;
	  width: 100%;
	  height: 100%;
	  position: absolute;
	  top: 0;
	  bottom: 0;
	  left: 0;
	  right: 0;
	}
</style>