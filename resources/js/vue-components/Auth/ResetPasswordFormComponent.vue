<template lang="pug">
  section.container.w-full.p-6.flex.flex-col.justify-center.items-center
    form.form.form_auth.form_login.relative(
      @submit.prevent="onFormSubmit"
      :class="{form_loading: isFormLoading}"
    )
      .form-loader
      .transition(name="fade")
        .h2.text-white.text-center.font-bold(v-if="replacingText" v-html="replacingText")
        div(v-else)
          .form__group.mb-6(v-if="!email")
            label.form__label.flex(for="email") {{ __('Email') }}
            input#email.form__input(
              v-model="request.data.email"
              :class="{ error: validationErrors.email }"
              name="email"
              type="text"
              :placeholder="__('my.real.email@ddress.there')"
            )
          .form__group.mb-6
            label.form__label.flex(for="password") {{ __('Password') }}
            input#password.form__input(
              v-model="request.data.password"
              :class="{ error: validationErrors.password }"
              name="password"
              type="password"
              :placeholder="__('Password')"
            )
            p.form__error-text(v-if="validationErrors.password") {{ getValidationErrorText('password') }}
          .form__group.mb-6
            label.form__label.flex(for="password_confirmation") {{ __('Confirm Password') }}
            input#password_confirmation.form__input(
              v-model="request.data.password_confirmation"
              :class="{ error: validationErrors.password_confirmation }"
              name="password_confirmation"
              type="password"
              :placeholder="__('Password confirmation')"
            )
            p.form__error-text(v-if="validationErrors.password_confirmation") {{ getValidationErrorText('password_confirmation') }}
          .flex.items-center.justify-between
            button.btn.w-full(type="submit") {{ __('Reset Password') }}
</template>

<script>
  import {formValidationMixin,} from '../../vue-mixins/formValidationMixin'

  export default {
    mixins: [formValidationMixin,],
    props: {
      email: {
        type: String,
        default: '',
      },
      token: {
        type: String,
        default: '',
      },
    },
    data() {
      return {
        request: {
          method: 'post',
          url: '/password/reset',
          data: {
            email: '',
            password: '',
            password_confirmation: '',
            token: '',
          },
        },
      }
    },
    created() {
      this.request.data.email = this.email
      this.request.data.token = this.token
    },
    methods: {
      createFormData() {
        return {}
      },
    },
  }
</script>
