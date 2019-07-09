<template lang="pug">
  section.container.w-full.p-6.flex.flex-col.justify-center.items-center
    form.form.form_auth.form_register.relative(
      @submit.prevent="onFormSubmit"
      :class="{form_loading: isFormLoading}"
    )
      .form-loader
      .flex.flex-wrap
        .form__group.mb-6(class="w-full md:w-1/2 md:mr-2")
          label.form__label.flex(for="first_name") {{ __('First Name') }}
          input#first_name.form__input(
            v-model="request.data.first_name"
            :class="{ error: validationErrors.first_name }"
            name="test"
            type="text"
            :placeholder="__('John')"
          )
          p.form__error-text(v-if="validationErrors.first_name") {{ getValidationErrorText('first_name') }}
        .form__group.mb-6(class="w-full md:w-auto")
          label.form__label.flex(for="last_name") {{ __('Last Name') }}
          input#last_name.form__input(
            v-model="request.data.last_name"
            :class="{ error: validationErrors.last_name }"
            name="test"
            type="text"
            :placeholder="__('Snow')"
          )
          p.form__error-text(v-if="validationErrors.first_name") {{ getValidationErrorText('last_name') }}
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
      .flex.flex-wrap
        .form__group.mb-6(class="w-full md:w-1/2 md:mr-2")
          label.form__label.flex(for="password") {{ __('Password') }}
          input#password.form__input(
            v-model="request.data.password"
            :class="{ error: validationErrors.password }"
            name="password"
            type="password"
            :placeholder="__('my$tr0ngP@ssw0rI)')"
          )
          p.form__error-text(v-if="validationErrors.password") {{ getValidationErrorText('password') }}
        .form__group.mb-6(class="w-full md:w-auto")
          label.form__label.flex(for="password_confirmation") {{ __('Confirmation') }}
          input#password_confirmation.form__input(
            v-model="request.data.password_confirmation"
            :class="{ error: validationErrors.password_confirmation }"
            name="password_confirmation"
            type="password"
            :placeholder="__('my$tr0ngP@ssw0rI)')"
          )
          p.form__error-text(v-if="validationErrors.password_confirmation") {{ getValidationErrorText('password_confirmation') }}
      .flex.flex-wrap.items-center.justify-between
        div.relative(class="w-full md:w-auto mb-4 md:mb-0")
          input#acceptTerms.light-choice(
            v-model="request.data.accept_terms"
            true-value="1"
            false-value=""
            type="checkbox"
          )
          label.form__label.flex(
            for="acceptTerms"
            :class="{ error: validationErrors.accept_terms }"
          )
            i
            | {{ __('I accept') }}&nbsp;
            a(
              href="/terms-and-conditions"
              target="_blank"
              class="transition text-gray-500 hover:text-gray-300"
            ) {{ __('terms and conditions') }}
          p.form__error-text(v-if="validationErrors.accept_terms") {{ getValidationErrorText('accept_terms') }}
        button.btn(
          class="w-full md:w-auto"
          type="submit"
        ) {{ __('Sign In') }}
      .mt-3.flex.justify-end
        router-link(
          class="inline-block align-baseline font-bold text-sm transition text-gray-500 hover:text-gray-300"
          to="/login"
        )  {{ __('Already have account?') }}
</template>

<script>
  import {formValidationMixin,} from '../../vue-mixins/formValidationMixin'

  export default {
    mixins: [formValidationMixin,],
    data() {
      return {
        request: {
          method: 'post',
          url: 'register',
          data: {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirmation: '',
            accept_terms: '',
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
