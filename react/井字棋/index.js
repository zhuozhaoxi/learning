function calculateWinner(squares) {
    const lines = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ];
    for (let i = 0; i < lines.length; i++) {
        const [a, b, c] = lines[i];
        if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
            return {winner: squares[a], line: [a, b, c]};
        }
    }
    return {winner: null, line: []};
}

function Square(props) {
    let styles;
    if (props.highlight) {
        styles = {
            color: 'red'
        }
    }
    return (
        <button
            className="square"
            onClick={() => props.onClick()}
            style={styles}>
            {props.value}
        </button>
    );
}

class Board extends React.Component {
    renderSquare(row, column) {
        const i = row * 3 + column;
        const winnerLine = this.props.winnerLine || [];
        const highlight = winnerLine.includes(i);
        return (
            <Square
                key={i}
                highlight={highlight}
                value={this.props.squares[i]}
                onClick={() => this.props.onClick(i)}
            />
        );
    }

    render() {
        let rows = [];
        for (let i = 0; i < 3; i++){
            let row = [];
            for (let j = 0; j < 3; j++){
                row.push(this.renderSquare(i,j))
            }
            rows.push((<div className="board-row" key={i}>{row}</div>));
        }
        return (
            <div>
                {rows}
            </div>
        );
    }
}

class Game extends React.Component {
    constructor() {
        super();
        this.state = {
            history: [{
                squares: Array(9).fill(null),
                lastStep: 'Game start'
            }],
            stepNumber: 0,
            xIsNext: true
        }
    }
    handleClick(i){
        const history = this.state.history.slice(0, this.state.stepNumber + 1);
        const current = history[history.length - 1];
        const squares = current.squares.slice();
        if (calculateWinner(squares).winner || squares[i]) {
            return;
        }
        squares[i] = this.state.xIsNext ? 'X' : 'O';
        const row = Math.floor(i / 3) + 1;
        const column = i % 3 + 1;
        const location = `(${row},${column})`;
        const desc = `${squares[i]} moved to ${location}`;
        this.setState((prevState, props) => ({
            history: history.concat([{
                squares: squares,
                lastStep: desc
            }]),
            stepNumber: history.length,
            xIsNext: !prevState.xIsNext,
        }));
    }

    jumpTo(step){
        this.setState({
            stepNumber: step,
            xIsNext: (step % 2) ? false : true,
        });
    }

    render() {
        const history = this.state.history;
        const current = history[this.state.stepNumber];
        const {winner,line:winnerLine} = calculateWinner(current.squares);

        const moves = history.map((step, move) => {
            let desc = step.lastStep;
            if(move === this.state.stepNumber){
                desc = (<strong>{desc}</strong>);
            }
            return (
                <li key={move}>
                    <a href="#" onClick={() => this.jumpTo(move)}>{desc}</a>
                </li>
            );
        });

        let status;
        if (winner) {
            status = 'Winner: ' + winner;
        } else {
            status = 'Next player: ' + (this.state.xIsNext ? 'X' : 'O');
        }
        return (
            <div className="game">
                <div className="game-board">
                    <Board
                        squares={current.squares}
                        winnerLine={winnerLine}
                        onClick={(i) => this.handleClick(i)}
                    />
                </div>
                <div className="game-info">
                    <div>{ status }</div>
                    <ol>{ moves }</ol>
                </div>
            </div>
        );
    }
}

// ========================================

ReactDOM.render(
<Game />,
    document.getElementById('root')
);
