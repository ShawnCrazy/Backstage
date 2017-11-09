var Login = React.createClass({
    getInitialState: function () {
        return {
            title: 'Please Sign In',
            mail: 'E-mail',
            pwd: 'Password',
            remember: 'Remember Me',
            login: 'Login',
            lang:'en'
        };
    },
    changeLang:function () {
        if (this.state.lang == 'en'){
            this.setState({
                title: '请登录',
                mail: '邮箱',
                pwd: '密码',
                remember: '记住我',
                login: '登录',
                lang:'cn'
            });
        }else {
            this.setState({
                title: 'Please Sign In',
                mail: 'E-mail',
                pwd: 'Password',
                remember: 'Remember Me',
                login: 'Login',
                lang:'en'
            });
        }
    },
    render: function () {
        return <div className="col-md-4 col-md-offset-4">
            <div className="login-panel panel panel-default">
                <div className="panel-heading">
                    <h3 className="panel-title">{this.state.title}</h3>
                </div>
                <div className="panel-body">
                    <form role="form">
                        <fieldset>
                            <div className="form-group">
                                <input className="form-control" placeholder={this.state.mail} name="email" type="email"
                                       autofocus/>
                            </div>
                            <div className="form-group">
                                <input className="form-control" placeholder={this.state.pwd} name="password" type="password"
                                       value=""/>
                            </div>
                            <div className="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"/>{this.state.remember}
                                </label>
                            </div>
                            <a href={this.props.href} className="btn btn-lg btn-success btn-block">{this.state.login}</a>
                        </fieldset>
                    </form>
                </div>
            </div>
            <a href="javascript:;" onClick={this.changeLang}>切换{this.state.lang}</a>
        </div>;
    }
})

ReactDOM.render(<Login href={document.getElementById('login-box').dataset.src}/>, document.getElementById('login-box'));