<template>
  <div class="ml-10 flex items-baseline">
      <inertia-link :href="route('dashboard')" :class="isUrl('dashboard') ? 'menu-active' : 'menu-normal'">Dashboard</inertia-link>
  </div>
</template>

<script>
import Icon from '@components/Icon'

export default {
  components: {
    Icon,
  },
  props: {
    url: String,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === '') {
        return this.url === ''
      }
      return urls.filter(url => this.url.startsWith(url)).length
    },
  },
}
</script>
