<template>
    <section class="container w-full p-6 flex flex-col justify-center items-center">

        <form class="form form_auth" @submit.prevent="onFormSubmit">
            <div class="form__group">
                <label class="form__label flex" for="email">
                    {{ __('Email') }}
                </label>
                <input :class="[{ error: validationErrors.email }, 'form__input']" name="email" id="email" type="text"
                       :placeholder="__('my.real.email@ddress.there')">
                <p v-if="validationErrors.email" class="form__error-text">{{getValidationErrorText('email')}}</p>
            </div>
            <div class="form__group">
                <label class="form__label flex flex-row justify-between" for="password">
                    {{ __('Password') }}
                    <router-link
                            class="inline-block align-baseline font-bold text-xs transition text-gray-500 hover:text-gray-300"
                            to="/register">
                        {{ __('Forgot Password?') }}
                    </router-link>
                </label>
                <input :class="[{ error: validationErrors.password }, 'form__input']" name="password" id="password"
                       type="password" :placeholder="__('my$tr0ngP@ssw0rI)')">
                <p v-if="validationErrors.password" class="form__error-text">{{getValidationErrorText('password')}}</p>
            </div>
            <div class="flex items-center justify-between">
                <button class="btn" type="submit">
                    {{ __('Sign In') }}
                </button>
                <router-link
                        class="inline-block align-baseline font-bold text-sm transition text-gray-500 hover:text-gray-300"
                        to="/register">
                    {{ __('Or create account?') }}
                </router-link>
            </div>

        </form>
    </section>

</template>

<script>
    import _ from 'lodash'
    import { formValidationMixin } from '../../vue-mixins/formValidationMixin'

    export default {
        mixins: [formValidationMixin],
        //TODO: add remember me!
    }
</script>
