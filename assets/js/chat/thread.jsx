define(function(require) {

    var $ = require('jquery');
    var React = require('react');
    var Messages = require('chat/messages');
    var Heading = require('chat/heading');
    var Compose = require('chat/compose');
    var CommunicationMixin = require('websockets/mixin');

    var Thread = React.createClass({

        mixins: [CommunicationMixin],

        fetchUrl: "/api/threads/view",
        sendUrl:  "/api/messages/add",
        recieveUri: "messages.add",

        fetched: function(data) {
            var users = [];
            data['thread']['users'].forEach(function(user){
                users.push(user.username);
            });

            this.setState({
                id: data['thread']['id'],
                title: data['thread']['title'],
                users: users,
                messages: data['messages'].reverse(),
            });
            $('#loading-messages').hide();
        },

        recieved: function(data) {
            if (data.thread_id != this.state.id) {
                return;
            }
            this.state.messages.push(data);
            this.setState({messages: this.state.messages});
        },

        render: function() {
            if (this.state === null) {
                return false;
            }
            return (
                <div>
                    <Heading title={this.state.title} users={this.state.users}/>
                    <hr/>
                    <Messages messages={this.state.messages}/>
                    <Compose submit={this.send} thread_id={this.state.id}/>
                </div>
            );
        }
    });

    return Thread;
});

