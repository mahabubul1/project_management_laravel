<template>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" v-on:click="markAsRead" id="notificationMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-16 fas fa-user-plus"></i>
          <span style="position: absolute;top: -11px;right: 6px;">{{unreadNotifications.length}}</span></span>
          </a>

        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown" aria-labelledby="notificationMenu">
          <ul class="list-style-none">
              <li>
                  <div class="drop-title border-bottom">You have 4 new messanges</div>
              </li>
              <li v-for="unreadNotification in unreadNotifications">
                  <div class="message-center message-body">
                      <a href="javascript:void(0)" class="message-item">
                          <span class="user-img"> <img src="dashboard/assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                          <span class="mail-contnet">
                              <h5 class="message-title">{{ unreadNotification.data.message }}</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </span>
                      </a>
                  </div>
              </li>
              <li v-for="notification in notifications">
                  <div class="message-center message-body">
                      <a href="javascript:void(0)" class="message-item">
                          <span class="user-img"> <img src="dashboard/assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                          <span class="mail-contnet">
                              <h5 class="message-title">{{ notification.data.message }}</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </span>
                      </a>
                  </div>
              </li>
          </ul>
      </div>
    </li>
</template>

<script>
    export default {
        props:['read_notifications','unread_notifications','userid'],
        data(){
          return {
            unreadNotifications: this.unread_notifications,
            notifications: this.read_notifications
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
              self.unreadNotifications = response.data.unreadNotifications;
              self.notifications = response.data.readNotifications;
            })
            .catch(function (error) {
              console.log(error);
            });
        },

        markAsRead: function(){
            var self = this;
            axios.get('mark_notification_as_read/' + this.userid)
            .then(function (response) {
              self.unreadNotifications = response.data.unreadNotifications;
              self.notifications = response.data.readNotifications;
            })
            .catch(function (error) {
              console.log(error);
            });
        },

      },
        mounted(){

          Echo.private('App.User.' + this.userid)
          .notification((notification) => {
            let newUnreadNotification = {data:{message:notification.message}};
            this.unreadNotifications.push(newUnreadNotification);
          });
        }
    }
</script>
