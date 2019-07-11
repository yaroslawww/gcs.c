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
      .form__group.mb-4
        label.form__label.flex.flex-row.justify-between(for="password")
          | {{ __('Password') }}
          router-link(
            class="inline-block align-baseline font-bold text-xs transition text-gray-500 hover:text-gray-300"
            to="/password/reset"
          ) {{ __('Forgot Password?') }}
        input#password.form__input(
          v-model="request.data.password"
          :class="{ error: validationErrors.password }"
          name="password"
          type="password"
          :placeholder="__('my$tr0ngP@ssw0rI)')"
        )
        p.form__error-text(v-if="validationErrors.password") {{ getValidationErrorText('password') }}
      .flex.items-center.justify-between
        div
          input#rememberMe.light-choice(
            v-model="request.data.remember"
            true-value="1"
            false-value=""
            type="checkbox"
          )
          label.form__label.flex(for="rememberMe")
            i
            | {{ __('Remember me') }}
        button.btn(type="submit") {{ __('Sign In') }}
      .mt-3.flex.justify-end
        router-link(
          class="inline-block align-baseline font-bold text-sm transition text-gray-500 hover:text-gray-300"
          to="/register"
        )  {{ __('Or create account?') }}
</template>

<script>
  import {formValidationMixin,} from '../../vue-mixins/formValidationMixin'

  export default {
    mixins: [formValidationMixin,],
    data() {
      return {
        request: {
          method: 'post',
          url: 'login',
          data: {
            email: '',
            password: '',
            remember: '',
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
