package modules;

import java.util.List;

// 計算グラフのノードを表すクラス
public class GraphNode {
    // ノードの値
    private double value;
    // このノードを生成するために使用された関数
    private Function function;
    // 入力ノードのリスト
    private List<GraphNode> inputs;
    // コンストラクト
    public GraphNode(double value, Function function, List<GraphNode> inputs) {
        this.value = value;
        this.function = function;
        this.inputs = inputs;
    }
    // 値を取得
    public double getValue() {
        return value;
    }
    // 関数を取得
    public Function getFunction() {
        return function;
    }
    // 入力ノードを取得
    public List<GraphNode> getInputs() {
        return inputs;
    }
    // 計算ノードの表示
    @Override
    public String toString() {
        return "Value: " + value + ", Function: " + function;
    }
}