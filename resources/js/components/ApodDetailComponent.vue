<template>
  <div>
    <img class="image" width="100%" :src=url>
    <div class="like-button">♡</div>
    <div class="image-title">{{ title }}</div>
    <div class="image-description">
      {{ date }} - {{ copyright }}
    </div>
    <div class="content">
      {{ explanation }}
	</div>
  </div>
</template>

<script>
export default {
  props: {
    copyright: {
      type: String
    },
    date: {
      type: String
    },
    explanation: {
      type: String
    },
    title: {
      type: String
    },
    url: {
      type: String
    },
  }
}
</script>

<style scoped>
	.image {
	  border-top-left-radius: 8px;
	  border-top-right-radius: 8px;
	}

	.like-button {
	  position: absolute;
	  right: 10px;
	  top: 10px;
	  padding: 1px 10px;
	  border-radius: 8px;
	  background-color: rgba(240, 240, 240, 0.8);
	  font-size: 1.2rem;
	}

	.loading-indicator {
	  background-size: cover;
	  background-position: center;
	  height: 139px;
	}

	.image-title {
	  padding: 10px 10px 5px 10px;
	  font-weight: bold;
	  font-size: 2rem;
	}

	.image-description {
	  padding: 0px 10px 10px 10px;
	  color: rgba(128, 128, 128, 0.8);
	  font-weight: 400;
	  font-size: 1.2rem;
	}

	.content {
	  padding: 10px;
	  font-size: 1.3rem;
	}
</style>