define(function(require) {

    var React = require('react');
    var $ = require('jquery');

    var Threads = React.createClass({

        render: function() {

            var threads = this.props.threads.map(function (thread){

                var users = [];
                thread['users'].forEach(function(user){
                    users.push(user.username);
                });

                var link = '/threads/view/' + thread['id'];

                var formatter = new Intl.DateTimeFormat("en", {month: "short"});
                var date = formatter.format(new Date(thread.modified)) + ' ' + new Date(thread.modified).getDay();

                return(
                    <div key={thread.id}>
                        <hr/>
                        <a href={link}>
                        <div className="row">
                            <div className="col-md-3 text-center">
                                <img src="/TwbsTheme/img/avatar.jpg" className="img-circle img-responsive center-block"/>
                            </div>
                            <div className="col-md-9">
                                <span className="pull-right">{date}</span>
                                {users}
                                <p>{thread['messages'][0]['body']}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                );
            });

            return (
                <div>{threads}</div>
            );
        }
    });

    return Threads;
});

