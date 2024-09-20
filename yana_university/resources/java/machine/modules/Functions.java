package modules;

import java.util.function.Function;

public class Functions {
    /**
     * 恒等変換
     * 
     * @param Node x
     * @return Node result
     */
    public static Function<Node, Node> identity = (Node x) -> {
        Node result = new Node();
        result.value = x.value;
        result.parents.add(x);
        x.children.add(result);
        x.childSelfGradients.put(result, 1.0);
        return result;
    };
    /** 
     * 二乗を計算(ラムダ関数) 
     *
     * @param Node x
     * @return Node result
     */
    public static Function<Node, Node> square = (Node x) -> {
        /** 新しいノードを作成 */
        Node result = new Node();
        result.setValue(x.value * x.value);
        result.parents.add(x);
        x.children.add(result);
        /** 勾配データの保存 */
        x.childSelfGradients.put(result, 2 * x.value);
        return result;
    };
    /**
     * 三乗
     * 
     * @param Node x
     * @return Node result
     */
    public static Function<Node, Node> cube = (Node x) -> {
        Node result = new Node();
        result.value = x.value * x.value * x.value;
        result.parents.add(x);
        x.children.add(result);
        x.childSelfGradients.put(result, 3 * x.value);
        return result;
    };
    /**
     * sigmoid関数
     * 
     * @param Node x
     * @return Node result
     */
    public static Function<Node, Node> sigmoid = (Node x) -> {
        Node result = new Node();
        result.value = 1 / (1 + Math.exp(x.value));
        result.parents.add(x);
        x.children.add(result);
        x.childSelfGradients.put(result, result.value * (1 - result.value));
        return result;
    };
    /**
     * 誤差関数
     * 
     * @param Node[] x
     * @param double[] t
     * 
     * @return Node result.value
     */
    public static Node Error(Node[] x, double[] t){
        Node result = new Node();
        for (int i = 0; i < x.length; i++) {
            result.value += (x[i].value - t[i]) * (x[i].value - t[i]);
        }
        result.value = Math.sqrt(result.value / x.length);
        result.optimalgradient = 1;
        for (int i = 0; i < x.length; i++) {
            result.parents.add(x[i]);
            x[i].children.add(result);
            x[i].childSelfGradients.put(result, (x[i].value - t[i]) / (x.length * result.value));
        }
        return result;
    }

}