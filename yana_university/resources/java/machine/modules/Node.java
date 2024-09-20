package modules;

import java.util.*;

public class Node {
    /** ノードのID */
    public int id;
    /** 親ノード */
    public List<Node> parents;
    /** 子ノード */
    public List<Node> children;
    /** 値 */
    public double value;
    /** 目的微分 */
    public double optimalgradient;
    /** 子ノードとその自己微分のマップ */
    public Map<Node, Double> childSelfGradients;
    /** コンストラクタ */
    public Node() {
        // ユニークなIDを生成
        this.id = NodeIdGenerator.getNextId();
        this.parents = new ArrayList<>();
        this.children = new ArrayList<>();
        this.childSelfGradients = new HashMap<>();
    }
    /** ノードの値を設定 */
    public void setValue(double value) {
        this.value = value;
    }
    /** 結果の確認用 */
    public void display() {
        System.out.println("id: " + this.id);
        System.out.println("値： " + this.value);
        System.out.println("子ノード： " + this.children);
        System.out.println("親ノード： " + this.parents);
        System.out.println("自己微分：" + this.childSelfGradients);
    }
}