<template>
  <v-layout>
    <v-card contextual-style="dark">
      <span slot="header">
        {{ $t('general.welcome') }}
      </span>
      <div slot="body">
        <p>
        </p>
        <p>
        </p>
        <p>
        </p>
        <a
          class="btn btn-outline-primary"
          target="_blank"
        >
          <i
            class="fa fa-github fa-fw"
            aria-hidden="true"
          />
          <span class="pl-2">
          </span>
        </a>
      </div>
      <div slot="footer">
      </div>
    </v-card>
  </v-layout>
</template>

<script>
/* ============
 * Home Index Page
 * ============
 *
 * The home index page.
 */

import VLayout from '@/layouts/Default.vue';
import VCard from '@/components/Card.vue';

export default {
  /**
   * The name of the page.
   */
  name: 'HomeIndex',

  /**
   * The components that the page can use.
   */
  components: {
    VLayout,
    VCard,
  },
};
</script>
