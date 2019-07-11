<template lang="pug">
  section.container.w-full.p-6.flex.flex-col.justify-center.items-center
    form.form.form_auth.form_login.relative(
      @submit.prevent="onFormSubmit"
      :class="{form_loading: isFormLoading}"
    )
      .form-loader
      .form__group.mb-6
        label.form__label.flex(for="email") {{ __('Email') }}
        input#email.form__input(
          v-model="request.data.email"
          :class="{ error: validationErrors.email }"
          name="email"
          type="text"
          :placeholder="__('my.real.email@ddress.there')"
        )
        p.form__error-text(v-if="validationErrors.email") {{ getValidationErrorText('email') }}
      .flex.items-center.justify-between
        button.btn.w-full(type="submit") {{ __('Send Reset Link') }}
</template>

<script>
  import {formValidationMixin,} from '../../vue-mixins/formValidationMixin'

  export default {
    mixins: [formValidationMixin,],
    data() {
      return {
        request: {
          method: 'post',
          url: '/password/email',
          data: {
            email: '',
          },
        },
      }
    },
    methods: {
      createFormData() {
        return {}
      },
    },
  }
</script>
