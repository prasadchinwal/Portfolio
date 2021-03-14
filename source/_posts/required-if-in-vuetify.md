---
extends: _layouts.post
section: content
title: Required If in Vuetify
date: 2020-07-12
description: Implementing Required If rule in Vuetify
categories: [vuetify]
featured: false
author: Chinwal Prasad
---

## What are we learning? 💁‍♂️

So there have been times in my work where I was working on a project and it was required of me to implement validation. My team uses Vuetify, a Vue UI Library for frontend. Vuetify has a built in validator. You can also use third-party validation libraries such as Vee-Validate and Vuelidate.

Although these libraries are very popular and good, you maynot want to install another dependency in your project. But there are times when the vuetify validation rules fall short. One example is implementing required_if rule in cases where you want one field required when the value of another field is set to something.

## Enough talk! Where's the code? 💁‍♂️

Let's get started with implementing the UI first. Here is our UI.

```js
<div id="app">
  <v-app>
    <v-content>
      <v-container>
        <v-row>
          <v-alert v-model="alert" border="left" close-text="Close Alert" :type="alertType" dark>{{ alertText }}
          </v-alert>
        </v-row>
        <v-form ref="myform" v-model="formValidity">
          <v-row>
            <v-text-field v-model="first_name" :rules="[rules.required]" solo label="First Name">
          </v-row>
          <v-row>
            <v-text-field v-model="last_name" :rules="requiredIfFirstName" solo label="Last Name">
          </v-row>
          </v-text-field>
          <v-row>
            <v-spacer></v-spacer>
            <v-btn color="success" @click="validate">Submit</v-btn>
          </v-row>
        </v-form>
      </v-container>
    </v-content>
  </v-app>
</div>
```

Let's assume that we have 2 fields in our form first name and last name. What we want is that the first name is **always** required and last name is only required when the first name value is equal to ***"Prasad"***. If the value of first name field is set to anything else then the last name field is not requied.

Let's see the Javascript code for this:

```js
new Vue({
  el: "#app",
  vuetify: new Vuetify(),
  data: () => ({
    formValidity: true,
    first_name: "",
    last_name: "",
    rules: {
      required: (value) => !!value || "Required."
    },
    alertText: "",
    alert: false,
    alertType: "error"
  }),
  computed: {
    requiredIfFirstName() {
      return [
        (v) => {
          if (this.first_name === "Prasad" && !v) {
            console.log("1");
            return "Last Name is required";
          }
          return true;
        }
      ];
    }
  },
  methods: {
    validate: function () {
      if (this.$refs.myform.validate()) {
        this.alertText = "Form is Valid!";
        this.alertType = "success";
        this.alert = true;
      } else {
        this.alertText = "Form is NOT Valid!";
        this.alertType = "error";
        this.alert = true;
      }
    }
  }
});

```

> Note:
>> Notice how we set the rules for last name field to a computed property? This allows us to implement our custom rule which is to make the last name field required only when the value of the field first name is equal to **"Prasad"**.

## Result and Codepen

<iframe height="500" style="width: 100%;" scrolling="no" title="Vuetify Required If" src="https://codepen.io/prasadchinwal5/embed/NWxBNjX?theme-id=dark&default-tab=js,result" frameborder="no" allowtransparency="true" allowfullscreen="true">See the Pen <a href='https://codepen.io/prasadchinwal5/pen/NWxBNjX'>Vuetify Required If</a> by prasad chinwal(<a href='https://codepen.io/prasadchinwal5'>@prasadchinwal5</a>) on <a href='https://codepen.io'>CodePen</a>.</iframe>

## Conclusion

Although this trick works great, there are many cases where this validation rule might fail quickly. Also keep in mind that as the number of fields in your form increase there will many computed properties which will need to be implemented to achieve this and consequently increase the code.

To avoid this you can always use the 3rd party libraries mentioned in the introduction which provide the ``` required_if``` validation rule out of the box. Example [Vee-Validate-Required-If](https://logaretm.github.io/vee-validate/guide/rules.html#required-if). Vuelidate also provides similar validation rule [Vuelidate-Required-If](https://vuelidate.js.org/#sub-builtin-validators).