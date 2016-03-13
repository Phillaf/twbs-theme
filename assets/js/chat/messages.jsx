define(function(require) {

    var React = require('react');
    var $ = require('jquery');

    var Messages = React.createClass({

        render: function() {

            var messages = this.props.messages.map(function (message){
                return(
                    <div className="message" key={message.id}>
                        <div className="pull-left">
                            <img src="/TwbsTheme/img/avatar.jpg" className="img-circle message-avatar" alt={message.user.username}/>
                        </div>
                        <div>
                            <span className="pull-right">{new Date(message.created).toDateString()}</span>
                            <p><a href="#">{message.user.username}</a></p>
                            {message.body}
                        </div>
                    </div>
                );
            });

            return (
                <div>{messages}</div>
            );
        }
    });

    return Messages;
});

