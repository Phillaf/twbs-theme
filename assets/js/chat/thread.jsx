define(function(require) {

    var $ = require('jquery');
    var React = require('react');
    var Messages = require('chat/messages');
    var Heading = require('chat/heading');
    var Compose = require('chat/compose');
    var CommunicationMixin = require('websockets/mixin');

    var Thread = React.createClass({

        mixins: [CommunicationMixin],

        fetchUrl: "/api/threads/view.json",
        sendUrl:  "/api/messages/add.json",
        recieveUri: "messages.add",

        fetched: function(data) {
            $('#loading-messages').hide();
            if (data['thread'] === null) {
                $('#no-messages').show();
                return;
            }
            var users = [];
            data['thread']['users'].forEach(function(user){
                users.push(user.username);
            });

            this.setState({
                id: data['thread']['id'],
                title: data['thread']['title'],
                users: users,
                messages: data['messages']
            });
        },

        recieved: function(data) {
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
