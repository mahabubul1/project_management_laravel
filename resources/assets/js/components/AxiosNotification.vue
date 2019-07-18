<template>
    <li>
        <div class="dropdown show">
          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notifications <span class="badge badge-light">{{unreadNotifications.length}}</span>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <ul>
              <li v-for="unreadNotification in unreadNotifications">
                  <a href="">{{ unreadNotification.data.message }}</a>
              </li>
            </ul>
          </div>
        </div>
    </li>
</template>

<script>
    export default {
        props:['unreads','userid'],
        data(){
          return {
            unreadNotifications: '',
          }
        },
        created: function () {
          this.fetchData()
        },
        methods: {
          fetchData: function () {
            var self = this;
            axios.get('notifications/' + this.userid)
            .then(function (response) {
              self.unreadNotifications = response.data;
            })
            .catch(function (error) {
              console.log(error);
            });
        },
      }
    }

</script>
