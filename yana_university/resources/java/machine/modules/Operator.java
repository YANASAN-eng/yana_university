package modules;

import java.util.*;
import java.util.function.Function;

public class Operator {
    /** 
     * 和
     * 
     * @param Node x
     * @param Node y
     * 
     * @return Node result
     */
    public static Node add(Node x, Node y){
        Node result = new Node();
        result.value = x.value + y.value;
        result.parents.add(x);
        result.parents.add(y);
        x.children.add(result);
        y.children.add(result);
        x.childSelfGradients.put(result, 1.0);
        y.childSelfGradients.put(result, 1.0);
        return result;
    }
    
    /** 
     * ベクトル和
     * 
     * @param Node[] x
     * @param Node[] y
     * 
     * @return Node[] result
     */
    public static Node[] add(Node[] x, Node[] y) throws Exception {
        if (x.length != y.length) {
            throw new Exception("足し合わせるベクトルの次元が異なります。");
        }
        Node[] result = new Node[x.length];
        for (int i = 0; i < x.length; i++) {
            result[i] = new Node();
            result[i].value = x[i].value + y[i].value;
            result[i].parents.add(x[i]);
            result[i].parents.add(y[i]);
            x[i].children.add(result[i]);
            y[i].children.add(result[i]);
            x[i].childSelfGradients.put(result[i], 1.0);
            y[i].childSelfGradients.put(result[i], 1.0);
        }
        return result;
    }
    
    /** 
     * 行列和
     * 
     * @param Node[][] x
     * @param Node[][] y
     * 
     * @return Node[][] result
     */
    public static Node[][] add(Node[][] x, Node[][] y) throws Exception{
        if (x.length != y.length || x[0].length != y[0].length) {
            throw new Exception("足し合わせる行列の型が一致しません。");
        } 
        Node[][] result = new Node[x.length][x[0].length];
        for (int i = 0; i < x.length; i++) {
            for (int j = 0; j < x[0].length; j++) {
                result[i][j] = new Node();
                result[i][j].value = x[i][j].value + y[i][j].value;
                result[i][j].parents.add(x[i][j]);
                result[i][j].parents.add(y[i][j]);
                x[i][j].children.add(result[i][j]);
                y[i][j].children.add(result[i][j]);
                x[i][j].childSelfGradients.put(result[i][j], 1.0);
                y[i][j].childSelfGradients.put(result[i][j], 1.0);
            }
        }
        return result;
    }

    /**
     * 差分
     * 
     * @param Node x
     * @param Node y
     * 
     * @return Node result
     */
    public static Node sub(Node x, Node y) {
        Node result = new Node();
        result.value = x.value - y.value;
        result.parents.add(x);
        result.parents.add(y);
        x.children.add(result);
        y.children.add(result);
        x.childSelfGradients.put(result, 1.0);
        y.childSelfGradients.put(result, -1.0);
        return result;
    }
    
    /**
     * ベクトル差分
     * 
     * @param Node[] x
     * @param Node[] y
     * 
     * @return Node[] result
     */
    public static Node[] sub(Node[] x, Node[] y)  throws Exception {
        if (x.length != y.length) {
            throw new Exception("足し合わせるベクトルの次元が異なります。");
        }
        Node[] result = new Node[x.length];
        for (int i = 0; i < x.length; i++) {
            result[i] = new Node();
            result[i].value = x[i].value - y[i].value;
            result[i].parents.add(x[i]);
            result[i].parents.add(y[i]);
            x[i].children.add(result[i]);
            y[i].children.add(result[i]);
            x[i].childSelfGradients.put(result[i], 1.0);
            y[i].childSelfGradients.put(result[i], -1.0);
        }
        return result;
    }
    
    /** 
     * 行列差分
     * 
     * @param Node[][] x
     * @param Node[][] y
     * 
     * @return Node[][] result
     */
    public static Node[][] sub(Node[][] x, Node[][] y) throws Exception{
        if (x.length != y.length || x[0].length != y[0].length) {
            throw new Exception("差分をとる行列の型が一致しません。");
        } 
        Node[][] result = new Node[x.length][x[0].length];
        for (int i = 0; i < x.length; i++) {
            for (int j = 0; j < x[0].length; j++) {
                result[i][j] = new Node();
                result[i][j].value = x[i][j].value - y[i][j].value;
                result[i][j].parents.add(x[i][j]);
                result[i][j].parents.add(y[i][j]);
                x[i][j].children.add(result[i][j]);
                y[i][j].children.add(result[i][j]);
                x[i][j].childSelfGradients.put(result[i][j], 1.0);
                y[i][j].childSelfGradients.put(result[i][j], -1.0);
            }
        }
        return result;
    }
    /**
     * 積
     * 
     * @param Node x
     * @param Node y
     * 
     * @return Node result
     */
    public static Node times(Node x, Node y) {
        Node result = new Node();
        result.value = x.value * y.value;
        result.parents.add(x);
        result.parents.add(y);
        x.children.add(result);
        y.children.add(result);
        x.childSelfGradients.put(result, y.value);
        y.childSelfGradients.put(result, x.value);
        return result;
    }
    /**
     * 行列積
     * 
     * @param Node[][] x
     * @param Node[][] y 
     * 
     * @return Node[][] result
     */
    public static Node[][] times(Node[][] x, Node[][] y) throws Exception {
        if (x[0].length != y.length) {
            throw new Exception("左側の行列の列数と右側の行列の行数が異なります。");
        }
        Node[][] result = new Node[x.length][y[0].length];
        for (int i = 0; i < x.length; i++) {
            for (int k = 0; k < y[0].length; k++) {
                result[i][k] = new Node();
                for (int j = 0; j < x[0].length; j++) {
                    result[i][k].value += x[i][j].value * y[j][k].value; 
                    result[i][k].parents.add(x[i][j]); 
                    result[i][k].parents.add(y[j][k]);
                    x[i][j].children.add(result[i][k]);
                    y[j][k].children.add(result[i][k]);
                    x[i][j].childSelfGradients.put(result[i][k], y[j][k].value);
                    y[j][k].childSelfGradients.put(result[i][k], x[i][j].value);
                }
            }
        }
        return result;
    }
    /**
     * 商
     * 
     * @param Node x
     * @param Node y
     * 
     * @return Node result
     */
    public static Node div(Node x, Node y) throws Exception {
        if (y.value == 0) {
            throw new Exception("０で割ることはできません");
        }
        Node result = new Node();
        result.value = x.value / y.value;
        result.parents.add(x); 
        result.parents.add(y);
        x.children.add(result);
        y.children.add(result);
        x.childSelfGradients.put(result, 1 / y.value);
        y.childSelfGradients.put(result, - x.value / (y.value * y.value));
        return result;
    }
    /**
     * 内積
     * 
     * @param Node[] x
     * @param Node[] y
     * 
     * @param Node result
     */
    public static Node inner(Node[] x, Node[] y) throws Exception {
        if (x.length != y.length) {
            throw new Exception("入力されたベクトルの次元が異なります。");
        }
        Node result = new Node();
        for (int i = 0; i < x.length; i++) {
            result.value += x[i].value * y[i].value;
            result.parents.add(x[i]);
            result.parents.add(y[i]);
            x[i].children.add(result);
            y[i].children.add(result);
            x[i].childSelfGradients.put(result, y[i].value);
            y[i].childSelfGradients.put(result, x[i].value);
        }
        return result;
    }
    /** 
     * Affine変換 
     * 
     * @param Node[] x
     * @param Node[][] W
     * @param Node[] b
     * 
     * @return Node[] result
     */
    public static Node[] affine(Node[] x, Node[][] W, Node[] b) throws Exception {
        if (x.length != W.length || W[0].length != b.length) {
            throw new Exception("入力次数と重みの行数、または、重みの列数とバイアスの次数は一致させる必要があります。");
        }
        Node[] result = new Node[W[0].length];
        for (int j = 0; j < W[0].length; j++) {
            result[j] = new Node();
            for (int i = 0; i < W.length; i++) {
                result[j].value += x[i].value * W[i][j].value;
                result[j].parents.add(x[i]);
                result[j].parents.add(W[i][j]);
                x[i].children.add(result[j]);
                W[i][j].children.add(result[j]);
                x[i].childSelfGradients.put(result[j], W[i][j].value);
                W[i][j].childSelfGradients.put(result[j], x[i].value);
            }
            result[j].value += b[j].value;
            result[j].parents.add(b[j]);
            b[j].children.add(result[j]);
            b[j].childSelfGradients.put(result[j], 1.0);
        }
        return result;
    }
    /**
     * 非線形変換
     * 
     * @param Node[] x
     * @param Function[] functions
     * @return Node[] result
     */
    public static Node[] nonLinear(Node[] x, List<Function<Node,Node>> fs) throws Exception {
        if (x.length != fs.size()) {
            throw new Exception("ベクトルと関数列の長さが一致しません。");
        }
        Node[] result = new Node[x.length];
        for (int i = 0; i < x.length; i++) {
            result[i] = new Node();
            result[i] = fs.get(i).apply(x[i]);
        }
        return result;
    }
    /**
     * layer
     * 
     * @param Node[] x
     * @param Node[][] W
     * @param Node[] b
     * @param Function[] fs
     * 
     * @return Node[] result
     */
    public static Node[] layer(Node[] x, Node[][] W, Node[] b, List<Function<Node,Node>> fs) {
        Node[] result = new Node[W[0].length];
        try {
            result = affine(x, W, b);
            for (int i = 0; i < fs.size(); i++) {
                result[i] = fs.get(i).apply(result[i]);
            }
        } catch (Exception e){
            e.printStackTrace();
        }
        return result;
    }
    /** 
     * 層の連結
     * 
     * @param Node[] x
     * @param Layer layers*
     * 
     * @return Node[]
     */
    public static Node[] connection(Node[] x, Layer...layers) {
        List<Node[]> list = new ArrayList<>();
        for (int i = 0; i < layers.length + 1; i++) {
            Node[] temp;
            if (i == 0) {
                temp = x;
            } else {
                temp = new Node[layers[i - 1].W[0].length];
                for (int j = 0; j < layers[i - 1].W[0].length; j++) {
                    temp[j] = new Node();
                }
            }
            list.add(temp);
        }
        for (int i = 0; i < layers.length; i++) {
            list.set(i + 1, layer(list.get(i), layers[i].W, layers[i].b, layers[i].fs));
        }
        return list.get(layers.length);
    }
    /**
     * 勾配降下法
     * 
     * @param Node x 入力
     * @param double[] t 訓練データ
     * @param double lambda 学習係数
     * @param Layer layers 層
     * @return void
     */
    public static void GDM(Node[] x, double[] t, double lambda, Layer... layers) {
        Node[] output = new Node[layers[layers.length - 1].W[0].length];
        output = connection(x, layers);
        Node error = Functions.Error(output, t);
        BackPropagation.backPropagation(error);
        for (int i = 0; i < layers.length; i++) {
            for (int j = 0; j < layers[i].W.length; j++) {
                for (int k = 0; k < layers[i].W[0].length; k++) {
                    layers[i].W[j][k].value -= lambda * layers[i].W[j][k].optimalgradient;
                }
            }
            for (int j = 0; j < layers[i].b.length; j++) {
                layers[i].b[j].value -= layers[i].b[j].optimalgradient;
            }
        }
    } 
    /**
     * キャスト(スカラー)
     * @param double x
     * 
     * @return Node result
     */
    public static Node castNode(double x) {
        Node result = new Node();
        result.value = x;
        return result;
    }
    /**
     * キャスト(ベクトル)
     * @param double[] x
     * 
     * @return Node[] result
     */
    public static Node[] castNode(double[] x) {
        Node[] result = new Node[x.length];
        for (int i = 0; i < x.length; i++) {
            result[i] = new Node();
            result[i].value = x[i];
        }
        return result;
    } 
    /**
     * キャスト(行列)
     * 
     * @param double[][] x
     * 
     * @return Node[][] result
     */
    public static Node[][] castNode(double[][] x) {
        Node[][] result = new Node[x.length][x[0].length];
        for (int i = 0; i < x.length; i++) {
            for (int j = 0; j < x[0].length; j++) {
                result[i][j] = new Node();
                result[i][j].value = x[i][j];
            }
        }
        return result;
     }
     /**
      * 初期化
      * 
      * @param Node[][]
      * 
      * @return void
      */
     public static void initial(Node node, int M, int N) {
        for (int i = 0; i < M; i++) {
            for (int j = 0; j < N; j++) {
                node = new Node();
            }
        }
     }
}